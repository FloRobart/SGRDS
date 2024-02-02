<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\EtudiantModel;
use App\Models\RattrapageModele;
use App\Models\DSModele;
use App\Models\AdministrateurModel;

class EtudiantController extends Controller
{
    public function index()
    {
        return view('etudiantVue');
    }
}