<?php
namespace App\Models;
use CodeIgniter\Model;
class EnseignantModele extends Model {

    // nom de la table gérée par ce modèle
    protected $table = 'enseignant';

    // clé primaire de la table
    protected $primaryKey = 'idEnseignant';

    // variables membres = colonnes de la table
    protected $allowedFields = ['nomEnseignant', 'prenomEnseignant', 'mailEnseignant', 'mdpEnseignant'];

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
                'nomEnseignant' => [
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                ],
                'prenomEnseignant' => [
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                ],
                'mailEnseignant' => [
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                ],
                'mdpEnseignant' => [
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                ],
            ];

            $this->forge->addField($fields);
            $this->forge->addKey('idEnseignant', TRUE); // clé primaire
            $this->forge->createTable($this->table, TRUE);
        }

        // charger les données
        $this->db = \Config\Database::connect();
    }

    // retourne la liste de tous les Enseignants, triés par nom
    public function get_all()
    {
        return $this->orderBy('nomEnseignant')->findAll();
    }

    // ajoute un Enseignant défini par un formulaire
    public function ajout()
    {
        // TODO
    }
}