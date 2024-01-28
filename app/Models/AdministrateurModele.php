<?php
namespace App\Models;
use CodeIgniter\Model;
class AdministrateurModele extends Model
{
    // nom de la table gérée par ce modèle
    protected $table = 'administrateur';

    // clé primaire de la table
    protected $primaryKey = 'idAdministrateur';

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
                'idAdministrateur' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'auto_increment' => true,
                ],
            ];

            $this->forge->addField($fields);
            $this->forge->addKey('idAdministrateur', TRUE); // clé primaire
            $this->forge->addForeignKey('idAdministrateur','Enseignant','idEnseignant'); // clé étrangère
            $this->forge->createTable($this->table, TRUE);
        }

        // charger les données
        $this->db = \Config\Database::connect();
    }

    // retourne la liste de tous les Administrateurs, triés par id
    public function get_all()
    {
        return $this->orderBy('idAdministrateur')->findAll();
    }

    // ajoute un Administrateur défini par un formulaire
    public function ajout()
    {
        // TODO
    }

}