<?php
namespace App\Models;
use CodeIgniter\Model;
class DSModele extends Model {

    // nom de la table gérée par ce modèle
    protected $table = 'ds';

    // clé primaire de la table
    protected $primaryKey = 'idDS';

    // variables membres = colonnes de la table
    protected $allowedFields = ['anneeDS', 'semestreDS', 'dateDS', 'heureDS', 'dureeDS', 'ressourceDS', 'typeDS', 'idEnseignant'];

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
                'anneeDS' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                ],
                'semestreDS' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                ],
                'dateDS' => [
                    'type' => 'DATE',
                ],
                'heureDS' => [
                    'type' => 'TIME',
                ],
                'dureeDS' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                ],
                'ressourceDS' => [
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                ],
                'typeDS' => [
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                ],
                'idEnseignant' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                ],
            ];

            $this->forge->addField($fields);
            $this->forge->addKey('idDS', TRUE); // clé primaire
            $this->forge->addForeignKey('idEnseignant','Enseignant','idEnseignant'); // clé étrangère
            $this->forge->createTable($this->table, TRUE);
        }

        // charger les données
        $this->db = \Config\Database::connect();
    }

    // retourne la liste de tous les DS, triés par nom
    public function get_all()
    {
        return $this->orderBy('annee')->findAll();
    }

    // ajoute un DS défini par un formulaire
    public function ajout()
    {
        // TODO
    }
}