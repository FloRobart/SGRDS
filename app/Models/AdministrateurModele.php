<?php 
namespace App\Models;  
use CodeIgniter\Model;

class AdministrateurModel extends Model
{
    protected $table = 'administrateur';
    
    protected $allowedFields = [
        'nom_admin',
        'email',
        'mdp_admin',
        'created_at',
        'reset_token',
        'reset_token_expiration'
    ];

    /**
     * Permet de récupérer un administrateur par son email
     * @param $email
     */
    public function getAdminByMail($mail)
    {
        return $this->where('email', $mail)->first();
    }

    /**
     * Supprime un administrateur de la table
     * @param $id
     */
    public function deleteAdmin($id)
    {
        return $this->where('id_admin', $id)->delete();
    }
}