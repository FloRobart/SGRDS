<?php
namespace App\Models;
use CodeIgniter\Model;
class AdministrateurModele extends Model
{
    // nom de la table gérée par ce modèle
    protected $table = 'administrateur';

    // clé primaire de la table
    protected $primaryKey = 'id';

    // variables membres = colonnes de la table
    protected $allowedFields = ['name_directeur', 'email', 'password_directeur', 'created_at', 'reset_token', 'reset_token_expiration'];

    // constructeur
    public function __construct()
    {
        // super()
        parent::__construct();

        // création de la table si elle n'existe pas déjà
        $this->forge = \Config\Database::forge();
        $this->db = \Config\Database::connect();

        if (!$this->db->tableExists($this->table))
        {
            $fields = [
                'name_directeur' => [
                    'type' => 'VARCHAR',
                    'constraint' => 150,
                ],
                'email' => [
                    'type' => 'VARCHAR',
                    'constraint' => 150,
                ],
                'password_directeur' => [
                    'type' => 'VARCHAR',
                    'constraint' => 150,
                ],
                'created_at' => [
                    'type' => 'TIMESTAMP',
                    'default' => 'CURRENT_TIMESTAMP',
                ],
                'reset_token' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ],
                'reset_token_expiration' => [
                    'type' => 'TIMESTAMP',
                ],
            ];

            $this->forge->addField($fields);
            $this->forge->addKey('id', TRUE); // clé primaire
            $this->forge->createTable($this->table, TRUE);
        }

        // charger les données
        $this->db = \Config\Database::connect();
    }
    

    // retourne la liste de tous les Administrateurs, triés par id
    public function get_all()
    {
        return $this->orderBy('id')->findAll();
    }

    // ajoute un Administrateur défini par un formulaire
    public function ajout()
    {
        // TODO
    }

}