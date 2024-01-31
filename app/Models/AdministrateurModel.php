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
     * Permet de récupérer un utilisateur par son email
     * @param $email
     */
    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}