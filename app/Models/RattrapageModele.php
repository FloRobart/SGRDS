<?php
namespace App\Models;
use CodeIgniter\Model;
class RattrapageModele extends Model {

    // nom de la table gérée par ce modèle
    protected $table = 'rattrapage';

    // clé primaire de la table
    protected $primaryKey = 'idRattrapage';

    // variables membres = colonnes de la table
    protected $allowedFields = ['idDS', 'dateRattrapage', 'horaireRattrapage', 'salleRattrapage', 'etatRattrapage'];

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
                'idDS' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                ],
                'dateRattrapage' => [
                    'type' => 'DATE',
                ],
                'horaireRattrapage' => [
                    'type' => 'TIME',
                ],
                'salleRattrapage' => [
                    'type' => 'VARCHAR',
                    'constraint' => 3,
                ],
                'etatRattrapage' => [
                    'type' => 'VARCHAR',
                    'constraint' => 15,
                ],
            ];

            $this->forge->addField($fields);
            $this->forge->addKey('idRattrapage', TRUE); // clé primaire
            $this->forge->addForeignKey('idDS','DS','idDS'); // clé étrangère
            $this->forge->createTable($this->table, TRUE);
        }

        // charger les données
        $this->db = \Config\Database::connect();
    }

    // retourne la liste de tous les rattrapages, triés par nom
    public function get_all()
    {
        return $this->orderBy('idRattrapage')->findAll();
    }

    // ajoute un rattrapage défini par un formulaire
    public function ajout()
    {
        // TODO
    }
}