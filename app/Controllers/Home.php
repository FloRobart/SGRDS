<?php

namespace App\Controllers;
use App\Models\UserModel;

class Home extends BaseController
{
    /**
     * Permet de factoriser le chargement des helpers et autres composants
     */
    public function __construct()
    {
        helper(['form']);
    }

    /**
     * Permet d'afficher la page d'accueil
     */
    public function index(): string
    {
        return view('homeView');
    }

    /**
     * Permet d'afficher la page d'inscription
     */
    public function inscription(): string
    {
        $data = [];
        echo view('inscriptionView', $data);
    }

    /**
     * Permet d'afficher la page d'inscription
     */
    public function validInscription(): string
    {
        $rules = [
            'name'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ];

        if($this->validate($rules)){
            $userModel = new UserModel();
            $data = [
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            return redirect()->to('/signin');
        }else{
            $data['validation'] = $this->validator;
            echo view('signup', $data);
        }
    }

    /**
     * Permet d'afficher la page de connexion
     */
    public function connexion(): string
    {
        return view('connexionView');
    }

    /**
     * Permet de se connecter
     */
    public function validConnexion(): string
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $userModel->where('email', $email)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/profile');
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/signin');
            }
        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/signin');
        }
    }

    /**
     * Permet de se déconnecter
     */
    public function logout()  
    {  
        //removing session  
        $this->session->unset_userdata('user');  
        redirect("Login");  
    }

    public function adminPage()
    {
        $session = session();
        echo "Hello : ".$session->get('name');
    }
}

?>