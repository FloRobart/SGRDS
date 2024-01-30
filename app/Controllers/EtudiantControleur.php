<?php
namespace App\Controllers;
use App\Models\EtudiantModele;
class EtudiantControleur extends BaseController
{
    public function index(): string
    {
        //récupérer le model
        $modele_etudiant = new EtudiantModele();
        //C R U D
        //Ajout (insert)
        $donnees1 =['nom' => "Rascoin", 'prenom' => "Gomain"];
        $donnees2 =['nom' => "Erea Hell", 'prenom' => "BTSteban"];
        $donnees3 =['nom' => "Flobart", 'prenom' => "Boris"];
        $donnees4 =['nom' => "Fizet", 'prenom' => "Blorian"];
        $modele_etudiant ->insert($donnees1);
        $modele_etudiant ->insert($donnees2);
        $modele_etudiant ->insert($donnees3);
        $modele_etudiant ->insert($donnees4);
        //Lecture (find (une seule ligne) ou findAll (toutes les lignes))
        $liste = $modele_etudiant->findAll();
        var_dump($liste);
        return view('etudiantVue',['etudiants' => $liste]);
    }
}