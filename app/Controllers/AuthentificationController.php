<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\DirecteurEtudeModel;

class AuthentificationController extends Controller
{
    public function __construct()
    {
        helper(['form', 'mail']);
    }



    /*=============*/
    /* INSCRIPTION */
    /*=============*/
    /**
     * Permet d'afficher le formulaire d'inscription
     */
    public function inscription()
    {
        return view('inscriptionVue', []);
    }

    /**
     * Permet de valider le formulaire d'inscription
     * Enregistre le nouvel utilisateur dans la base de données
     * Redirige vers la page de connexion
     */
    public function validationInscription()
    {
        $rules = [
            'name_directeur'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[directeur_etude.email]',
            'name_directeur'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ];

        if($this->validate($rules)){
            $directeurEtudeModel = new DirecteurEtudeModel();
            $data = [
                'name_directeur'     => $this->request->getVar('name_directeur'),
                'email'    => $this->request->getVar('email'),
                'name_directeur' => password_hash($this->request->getVar('name_directeur'), PASSWORD_DEFAULT)
            ];
            $directeurEtudeModel->save($data);
            return redirect()->to('connexion');
        }else{
            $data['validation'] = $this->validator;
            return view('inscriptionVue', $data);
        }
    }



    /*===========*/
    /* CONNEXION */
    /*===========*/
    /**
     * Permet d'afficher le formulaire de connexion
     */
    public function connexion()
    {
        echo view('connexionVue');
    } 

    /**
     * Permet de valider le formulaire de connexion
     * Connecte l'utilisateur
     */
    public function validationConnexion()
    {
        $session = session();
        $directeurEtudeModel = new DirecteurEtudeModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('name_directeur');
        
        $data = $directeurEtudeModel->where('email', $email)->first();
        
        if($data){
            $pass = $data['name_directeur'];
            if(password_verify($password, $pass)){
                $ses_data = [
                    'id' => $data['id'],
                    'name_directeur' => $data['name_directeur'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('profile');
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('connexion');
            }
        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/connexion');
        }
    }



    /*=====================*/
    /* MOT DE PASSE OUBLIÉ */
    /*=====================*/
    /*--------------------------------------------------*/
    /* Envoi du mail pour réinitialiser le mot de passe */
    /*--------------------------------------------------*/
    /**
     * Permet d'envoyer le mail pour réinitialiser le mot de passe
     * Enregistre le token dans la base de données
     * Envoie le mail pour réinitialiser le mot de passe
     * Redirige vers la page de réinitialisation du mot de passe
     */
    public function sendResetLink()
    {
        $emailTo = isset($_GET['email']) ? $_GET['email'] : null;

        if ($emailTo == null)
        {
            /* Fait en sorte que l'utilisateur soit redirigé vers la page de connexion avec un message d'erreur */
            $session = session();
            $session->setFlashdata('msg', 'Veuillez entrer l\'adresse e-mail associée à votre compte');
            return redirect()->to('/connexion');
        }

        $directeurEtudeModel = new DirecteurEtudeModel();
        $user = $directeurEtudeModel->where('email', $emailTo)->first();
        if ($user)
        {
            // Générer un jeton de réinitialisation de MDP et enregistrer-le dans BD
            $token = bin2hex(random_bytes(16));
            $directeurEtudeModel->set('reset_token', $token) // Token
            ->set('reset_token_expiration', date('Y-m-d H:i:s', strtotime('+1 hour'))) // Expiration du token
            ->update($user['id']);

            /* Paramètres du mail */
            $from ='portgasd.ace491803@gmail.com';
            $subject = 'réinitialisation de mot de passe';
            $message = 'Cliquez sur le lien suivant pour réinitialiser MDP : ' . site_url("reset_password/$token");

            /* Utilisation de la classe email */
            $emailService = \Config\Services::email();
            $emailService->setTo($emailTo);
            $emailService->setFrom($from);
            $emailService->setSubject($subject);
            $emailService->setMessage($message);

            /* Envoi du mail */
            if ($emailService->send())
            {
                // TODO : Afficher un message de succès + ajouter un bouton pour coller le token qui permettra de réinitialiser le mot de passe
                echo 'E-mail envoyé avec succès.<br />Vérifiez votre boîte de réception puis fermet cette onglet.';
            }
            else
            {
                echo $emailService->printDebugger();
            }
        }
        else
        {
            $session = session();
            $session->setFlashdata('msg', 'Cette adresse e-mail n\'est pas associée à un compte');
            return redirect()->to('/connexion');
        }
    }

    /*----------------------------------*/
    /* RÉINITIALISATION DU MOT DE PASSE */
    /*----------------------------------*/
    /**
     * Permet de vérifier le token
     * Afficher le formulaire de réinitialisation du mot de passe
     */
    public function reset($token)
    {
        $directeurEtudeModel = new DirecteurEtudeModel();
        $user = $directeurEtudeModel->where('reset_token', $token)
        ->where('reset_token_expiration >', date('Y-m-d H:i:s'))
        ->first();
        if ($user) {
            return view('resetPasswordVue', ['token' => $token]);
        } else {
            return 'Lien de réinitialisation non valide.';
        }
    }

    /**
     * Permet de valider le formulaire de réinitialisation du mot de passe
     * Réinitialise le mot de passe dans la base de données
     * Affiche un message de succès ou d'erreur et un bouton pour retourner à la page de connexion
     */
    public function updatePassword()
    {
        $token = $this->request->getPost('token');
        $password = $this->request->getPost('name_directeur');
        $confirmPassword = $this->request->getPost('confirm_password');
        // Valider et traiter les données du formulaire
        $directeurEtudeModel = new DirecteurEtudeModel();
        $user = $directeurEtudeModel->where('reset_token', $token)
        ->where('reset_token_expiration >', date('Y-m-d H:i:s'))
        ->first();
        if ($user && $password === $confirmPassword) {
        // Mettre à jour le mot de passe et réinitialiser le jeton
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $directeurEtudeModel->set('name_directeur', $hashedPassword)
        ->set('reset_token', null)
        ->set('reset_token_expiration', null)
        ->update($user['id']);
            return '<span>Mot de passe réinitialisé avec succès.</span><br /><input type="button" value="Retour à la page de connexion" onclick="window.location.href=\'connexion\'">';
        } else {
            return '<span>Erreur lors de la réinitialisation du mot de passe.</span><br /><input type="button" value="Retour à la page de connexion" onclick="window.location.href=\'connexion\'">';
        }
    }



    /*=============*/
    /* DECONNEXION */
    /*=============*/
    public function deconnexion()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('connexion');
    }
}