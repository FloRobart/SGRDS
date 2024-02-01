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
        'prenom_etudiant',
        'annee_etudiant'
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
     * Permet de récupérer tous les étudiants
     */
    public function getAllEtudiants()
    {
        return $this->findAll();
    }

    /**
     * Permet de récupérer tous les étudiants d'une année
     * @param $annee
     */
    public function getAllEtudiantsByAnnee($annee)
    {
        return $this->where('annee_etudiant', $annee)->findAll();
    }

    /**
     * Supprime un étudiant de la table
     * @param $id
     */
    public function deleteEtudiant($id)
    {
        return $this->where('id_etudiant', $id)->delete();
    }

    /**
     * Permet de récupérer tous rattrapages auquel l'étudiant est éligible
     * @param $id_etudiant
     */
    public function getRattrapagesEligible($id_etudiant)
    {
        return $this->query('SELECT * FROM rattrapage WHERE id_rattrapage IN (SELECT id_rattrapage FROM eligible WHERE id_etudiant = '.$id_etudiant.')')->getResult();
    }
}