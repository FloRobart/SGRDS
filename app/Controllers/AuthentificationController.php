<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\DirecteurEtudeModel;

class AuthentificationController extends Controller
{
    public function __construct()
    {
        helper(['form']);
    }

    /*=============*/
    /* INSCRIPTION */
    /*=============*/
    public function inscription()
    {
        return view('inscriptionVue', []);
    }

    public function validationInscription()
    {
        $rules = [
            'name'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[directeur_etude.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ];

        if($this->validate($rules)){
            $directeurEtudeModel = new DirecteurEtudeModel();
            $data = [
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
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
    public function connexion()
    {
        echo view('connexionVue');
    } 

    public function validationConnexion()
    {
        $session = session();
        $directeurEtudeModel = new DirecteurEtudeModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $directeurEtudeModel->where('email', $email)->first();
        
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
                return redirect()->to('profile');
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('connexion');
            }
        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('connexion');
        }
    }
}