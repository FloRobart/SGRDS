<?php
namespace App\Models;
use CodeIgniter\Model;
class RattrapageModele extends Model {

    // nom de la table gérée par ce modèle
    protected $table = 'rattrapage';

    // variables membres = colonnes de la table
    protected $allowedFields = [
        'id_ds',
        'date_rattrapage',
        'horaire_rattrapage',
        'salle_rattrapage',
        'etat_rattrapage',
        'enseignant_rattrapage'
    ];
    

    /**
     * retourne tous les rattrapages, triés par date
     */
    public function getAllRattrapages()
    {
        return $this->orderBy('date_rattrapage', 'ASC')->findAll();
    }

    /**
     * retourne tous les rattrapages à l'état correspondant
     * @param $etat, correspond à un des éléments dans cette liste : ['EN COURS', 'PROGRAMME', 'NEUTRALISE']
     */
    public function getAllRattrapagesByType($type)
    {
        return $this->where('etat_rattrapage', $type)->orderBy('date_rattrapage', 'ASC')->findAll();
    }

    /**
     * retourne tous les étudiants concernés par le rattrapage correspondant
     * @param $id_rattrapage
     */
    public function getAllEtudiantsByRattrapage($id_rattrapage)
    {
        return $this->query('SELECT * FROM etudiant WHERE id_etudiant IN (SELECT id_etudiant FROM eligible WHERE id_rattrapage = '.$id_rattrapage.')')->getResult();
    }

    public function getIdDs($id_rattrapage)
    {
        return $this->select('id_ds')->where('id_rattrapage', $id_rattrapage)->first();
    }

    /**
     * modifie le rattapage correspondant
     * @param $id_rattrapage
     * @param $date_rattrapage
     * @param $horaire_rattrapage
     * @param $salle_rattrapage
     * @param $etat_rattrapage
     * @param $enseignant_rattrapage
     */
    public function updateRattrapage($id_rattrapage, $date_rattrapage, $horaire_rattrapage, $salle_rattrapage, $etat_rattrapage, $enseignant_rattrapage)
    {
        $this->where('id_rattrapage', $id_rattrapage)->set([
            'date_rattrapage' => $date_rattrapage,
            'horaire_rattrapage' => $horaire_rattrapage,
            'salle_rattrapage' => $salle_rattrapage,
            'etat_rattrapage' => $etat_rattrapage,
            'enseignant_rattrapage' => $enseignant_rattrapage
        ])->update();
    }
}