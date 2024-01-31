<?php
namespace App\Models;
use CodeIgniter\Model;
class EligibleModele extends Model
{
    protected $table = 'eligible';
    
    protected $allowedFields = [
        'id_rattrapage',
        'id_etudiant',
        'justification',
    ];

    /**
     * Permet de récupérer les étudiants qui sont éligibles à un rattrapage
     * @param $id_rattrapage
     */
    public function getEligibleByRattrapage($id_rattrapage)
    {
        return $this->where('id_rattrapage', $id_rattrapage)->where('justification', true)->findAll();
    }

}