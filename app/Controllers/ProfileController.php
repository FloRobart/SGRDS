<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $session = session();
        echo 'Bonjour ' . $session->get('nom_admin');
    }
}