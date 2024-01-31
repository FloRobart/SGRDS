<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $session = session();
        // affiche toute les données de la session
        var_dump($session->get());
    }
}