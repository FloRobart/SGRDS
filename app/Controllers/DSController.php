<?php 
namespace App\Controllers;  
use App\Models\DSModele;
use App\Models\RattrapageModele;
use CodeIgniter\Controller;
use App\Models\AdministrateurModel;

class DSController extends Controller
{
    public function __construct()
    {
        helper(['form', 'mail']);
    }

    public function addDs($intitule_ds, $semestre_ds, $date_ds, $heure_ds, $duree_ds, $ressource_ds, $type_ds)
    {
        $model = new DSModele();
        $model->insert([
            'intitule_ds' => $intitule_ds,
            'semestre_ds' => $semestre_ds,
            'date_ds' => $date_ds,
            'heure_ds' => $heure_ds,
            'duree_ds' => $duree_ds,
            'ressource_ds' => $ressource_ds,
            'type_ds' => $type_ds
        ]);
        $modelRattrapge = new RattrapageModele();
        $modelRattrapge->insert([
            'id_ds' => $model->insertID(),
            'date_rattrapage' => $date_ds,
            'horaire_rattrapage' => $heure_ds,
            'salle_rattrapage' => $ressource_ds,
            'etat_rattrapage' => 'EN COURS',
            'enseignant_rattrapage' => 'A DEFINIR'
        ]);
     
    }
}