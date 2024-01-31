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
}