<?php
namespace App\Models;
use CodeIgniter\Model;
class DSModele extends Model {

    // nom de la table gérée par ce modèle
    protected $table = 'ds';

    // clé primaire de la table
    protected $primaryKey = 'id_ds';

    // variables membres = colonnes de la table
    protected $allowedFields = ['annee_ds', 'semestre_ds', 'date_ds', 'heure_ds', 'duree_ds', 'ressource_ds', 'type_ds'];

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
                'annee_ds' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                ],
                'semestre_ds' => [
                    'type' => 'VARCHAR',
                    'constraint' => 8,
                ],
                'date_ds' => [
                    'type' => 'DATE',
                ],
                'heure_ds' => [
                    'type' => 'TIME',
                ],
                'duree_ds' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                ],
                'ressource_ds' => [
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                ],
                'type_ds' => [
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
            $this->forge->addKey('id_ds', TRUE); // clé primaire
            $this->forge->createTable($this->table, TRUE);
        }

        // charger les données
        $this->db = \Config\Database::connect();
    }

    // retourne la liste de tous les ds, triés par nom
    public function get_all()
    {
        return $this->orderBy('annee')->findAll();
    }

    // ajoute un ds défini par un formulaire
    public function ajout()
    {
        // TODO
    }
}