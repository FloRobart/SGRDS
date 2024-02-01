<?php
namespace App\Models;
use CodeIgniter\Model;
class EtudiantModele extends Model
{
    protected $table = 'etudiant';
    
    protected $allowedFields = [
        'id_etudiant',
        'mail_etudiant',
        'nom_etudiant',
        'prenom_etudiant'
    ];


    /**
     * Permet de récupérer un étudiant par son email
     * @param $email
     */
    public function getEtudiantByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    /**
     * Permet de récupérer un étudiant par son id
     * @param $id
     */
    public function getEtudiantById($id)
    {
        return $this->where('id_etudiant', $id)->first();
    }

    /**
     * Supprime un étudiant de la table
     * @param $id
     */
    public function deleteEtudiant($id)
    {
        return $this->where('id_etudiant', $id)->delete();
    }
}