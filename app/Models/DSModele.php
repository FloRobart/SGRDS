<?php
namespace App\Models;
use CodeIgniter\Model;
class DSModele extends Model {

    // nom de la table gérée par ce modèle
    protected $table = 'ds';

    // variables membres = colonnes de la table
    protected $allowedFields = [
        'annee_ds',
        'semestre_ds',
        'date_ds',
        'heure_ds',
        'duree_ds',
        'ressource_ds',
        'type_ds'
    ];

    /**
     * retourne tous les ds, triés par date
     */
    public function getAllDS()
    {
        return $this->orderBy('date_ds', 'ASC')->findAll();
    }

    /**
     * retourne tous les ds qui ont un rattrapage, triés par date
     */
    public function getAllDSWithRattrapage()
    {
        return $this->where('id_ds IN (SELECT id_ds FROM rattrapage)')->orderBy('date_ds', 'ASC')->findAll();
    }

    /**
     * retourne tous les ds de la ressource, triés par date
     * @param $ressource
     */
    public function getAllDSByRessource($ressource)
    {
        return $this->where('ressource_ds', $ressource)->orderBy('date_ds', 'ASC')->findAll();
    }

    /**
     * retourne tous les ds du type correspondant, triés par date
     * @param $type
     */
    public function getAllDSByType($type)
    {
        return $this->where('type_ds', $type)->orderBy('date_ds', 'ASC')->findAll();
    }

}