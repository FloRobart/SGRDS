<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use app\View;

class ProfileController extends Controller
{
    public function index()
    {
        $session = session();
        echo view('header');
        echo 'Bonjour ' . $session->get('nom_admin');
    }
}