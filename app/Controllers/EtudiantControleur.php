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
        $donnees1 =['nomEtudiant' => "Rascoin", 'prenomEtudiant' => "Gomain"];
        $donnees2 =['nomEtudiant' => "Erea Hell", 'prenomEtudiant' => "BTSteban"];
        $donnees3 =['nomEtudiant' => "Flobart", 'prenomEtudiant' => "Boris"];
        $donnees4 =['nomEtudiant' => "Fizet", 'prenomEtudiant' => "Blorian"];

        $modele_etudiant ->insert($donnees1);
        $id1 = $modele_etudiant->insertID();

        $modele_etudiant ->insert($donnees2);
        $id2 = $modele_etudiant->insertID();

        $modele_etudiant ->insert($donnees3);
        $id3 = $modele_etudiant->insertID();

        $modele_etudiant ->insert($donnees4);
        $id4 = $modele_etudiant->insertID();

        //Lecture (find (une seule ligne) ou findAll (toutes les lignes))
        $liste = $modele_etudiant->findAll();
        var_dump($liste);
        return view('etudiantVue',['etudiants' => $liste]);
    }
}