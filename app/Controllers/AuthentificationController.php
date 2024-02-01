<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\AdministrateurModel;

class AuthentificationController extends Controller
{
    public function __construct()
    {
        helper(['form', 'mail']);
        $session = session();
    }


    /**
     * Permet d'afficher la page de profil
     */
    public function profile()
    {
        echo view('profileVue', session()->get());
    }

    /*=============*/
    /* INSCRIPTION */
    /*=============*/
    /**
     * Permet d'afficher le formulaire d'inscription
     */
    public function inscription()
    {
        return view('formInscriptionVue');
    }

    /**
     * Permet de valider le formulaire d'inscription
     * Enregistre le nouvel utilisateur dans la base de données
     * Redirige vers la page de connexion
     */
    public function validationInscription()
    {
        $rules = [
            'nom_admin'       => 'required|min_length[2]|max_length[50]',
            'email'           => 'required|min_length[4]|max_length[150]|valid_email|is_unique[administrateur.email]',
            'mdp_admin'       => 'required|min_length[4]|max_length[50]',
            'confirmpassword' => 'matches[mdp_admin]'
        ];

        if($this->validate($rules)){
            $administrateurModel = new AdministrateurModel();
            $data = [
                'nom_admin' => $this->request->getVar('nom_admin'),
                'email'     => $this->request->getVar('email'),
                'mdp_admin' => password_hash($this->request->getVar('mdp_admin'), PASSWORD_DEFAULT)
            ];
            $administrateurModel->save($data);
            return redirect()->to('connexion');
        }else{
            $data['validation'] = $this->validator;
            return view('formInscriptionVue', $data);
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
        echo view('formConnexionVue');
    } 

    /**
     * Permet de valider le formulaire de connexion
     * Connecte l'utilisateur
     */
    public function validationConnexion()
    {
        $session = session();
        $administrateurModel = new AdministrateurModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('mdp_admin');
        
        $data = $administrateurModel->where('email', $email)->first();
        
        if($data){
            $pass = $data['mdp_admin'];
            if(password_verify($password, $pass)){
                $ses_data = [
                    'nom_admin' => $data['nom_admin'],
                    'id' => $data['id'],
                    'mdp_admin' => $data['mdp_admin'],
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

        $administrateurModel = new AdministrateurModel();
        $user = $administrateurModel->where('email', $emailTo)->first();
        if ($user)
        {
            // Générer un jeton de réinitialisation de MDP et enregistrer-le dans BD
            $token = bin2hex(random_bytes(16));
            $administrateurModel->set('reset_token', $token) // Token
            ->set('reset_token_expiration', date('Y-m-d H:i:s', strtotime('+1 hour'))) // Expiration du token
            ->update($user['id']);

            /* Paramètres du mail */
            $from ='portgasd.ace491803@gmail.com';
            $subject = 'réinitialisation de votre mot de passe SGRDS';
            $message = 'Cliquez sur le lien suivant pour réinitialiser votre mot de passe : ' . site_url("reset_password/$token?email=$emailTo");

            /* Utilisation de la classe email */
            $emailService = \Config\Services::email();
            $emailService->setTo($emailTo);
            $emailService->setFrom($from);
            $emailService->setSubject($subject);
            $emailService->setMessage($message);

            /* Envoi du mail */
            if ($emailService->send())
            {
                return view('sendResetLinkVue', ['email' => $emailTo]);
            }
            else
            {
                echo $emailService->printDebuggerwhere();
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
        $administrateurModel = new AdministrateurModel();
        $user = $administrateurModel->where('reset_token', $token)
        ->where('reset_token_expiration >', date('Y-m-d H:i:s'))
        ->first();
        if ($user) {
            return view('resetPasswordVue', ['token' => $token]);
        } else {
            return view('header') . '<h1 class="text-center">Lien de réinitialisation non valide.</h1><br /><br /><div class="row"><div class="col-md-8 offset-md-2 text-center"><a href="/" class="btn btn-primary text-center">Retour à la page d\'accueil</a></div></div>' . view('footer');
        }
    }

    /**
     * Permet de valider le formulaire de réinitialisation du mot de passe
     * Réinitialise le mot de passe dans la base de données
     * Affiche un message de succès ou d'erreur et un bouton pour retourner à la page de connexion
     */
    public function updatePassword()
    {
        $administrateurModel = new AdministrateurModel();
        $email = $this->request->getPost('email');
        //echo var_dump($email);
        $user = $administrateurModel->where('email', $email)->first();
        $token = $administrateurModel->select('reset_token')->where('email', $email)->first();
        $tokenExpiration = $administrateurModel->select('reset_token_expiration')->where('email', $email)->first();

        $password = $this->request->getPost('mdp_admin');
        $confirmPassword = $this->request->getPost('confirme_mdp_admin');
        // Valider et traiter les données du formulaire
        if ($user && $password === $confirmPassword && $token && $tokenExpiration > date('Y-m-d H:i:s'))
        {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $administrateurModel->set('mdp_admin', $hashedPassword)
            ->set('reset_token', null)
            ->set('reset_token_expiration', null)
            ->update($user['id']);

            return view('updatePasswordVue', ['success' => true]);
        }
        else
        {
            return view('updatePasswordVue', ['success' => false]);
        }
    }



    /*=============*/
    /* DECONNEXION */
    /*=============*/
    public function deconnexion()
    {
        $session = session();
        $session->set('isLoggedIn', FALSE); // Définir la variable de session à false (déconnecté)
        $session->destroy();
        return redirect()->to('/');
    }
}