<?php
namespace App\Controllers;
use App\Models\EtudiantModele;

class EtudiantControleur extends BaseController
{
    public function index(): string
    {
        //récupérer le model
        $modele_etudiant = new EtudiantModele();
        // insère 1 étudiant
        $modele_etudiant->insert([
            'nom_etudiant' => 'Doe',
            'prenom_etudiant' => 'John'
        ]);

        return view('etudiantVue');
    }
}