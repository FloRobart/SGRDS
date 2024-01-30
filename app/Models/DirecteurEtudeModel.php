<?php 
namespace App\Models;  
use CodeIgniter\Model;

class DirecteurEtudeModel extends Model
{
    protected $table = 'directeur_etude';
    
    protected $allowedFields = [
        'name',
        'email',
        'password',
        'created_at'
    ];
}