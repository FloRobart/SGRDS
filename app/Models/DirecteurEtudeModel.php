<?php 
namespace App\Models;  
use CodeIgniter\Model;

class DirecteurEtudeModel extends Model
{
    protected $table = 'directeur_etude';
    
    protected $allowedFields = [
        'name_directeur',
        'email',
        'password_directeur',
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