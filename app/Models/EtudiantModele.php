<?php
namespace App\Models;
use CodeIgniter\Model;
class EtudiantModele extends Model {

    // nom de la table gérée par ce modèle
    protected $table = 'Etudiant';

    // clé primaire de la table
    protected $primaryKey = 'idEtudiant';

    // variables membres = colonnes de la table
    protected $allowedFields = ['nomEtudiant', 'prenomEtudiant'];

    // paramètres supplémentaires
    protected $returnType = 'array';
    protected $useAutoIncrement = true;

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
                'nomEtudiant' => [
                    'type' => 'VARCHAR',
                    'constraint' => 50,
                ],
                'prenomEtudiant' => [
                    'type' => 'VARCHAR',
                    'constraint' => 50,
                ],
            ];

            $this->forge->addField($fields);
            $this->forge->addKey('idEtudiant', TRUE); // clé primaire
            $this->forge->createTable($this->table, TRUE);
        }

        // charger les données
        $this->db = \Config\Database::connect();
    }

    // retourne la liste de tous les Etudiants, triés par nom
    public function get_all()
    {
        return $this->orderBy('nomEtudiant')->findAll();
    }

    // ajoute un Etudiant défini par un formulaire
    public function ajout()
    {
        // TODO
    }
}