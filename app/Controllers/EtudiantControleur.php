<?php
namespace App\Controllers;
use App\Models\EtudiantModele;

class EtudiantControleur extends BaseController
{
    public function index(): string
    {
        return view('etudiantVue');
    }
}