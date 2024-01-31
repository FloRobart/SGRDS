<?php
namespace App\Models;
use CodeIgniter\Model;
class RattrapageModele extends Model {

    // nom de la table gérée par ce modèle
    protected $table = 'rattrapage';

    // clé primaire de la table
    protected $primaryKey = 'id_rattrapage';

    // variables membres = colonnes de la table
    protected $allowedFields = ['id_ds', 'date_rattrapage', 'horaire_rattrapage', 'salle_rattrapage', 'etat_rattrapage'];

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
                'id_ds' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                ],
                'date_rattrapage' => [
                    'type' => 'DATE',
                ],
                'horaire_rattrapage' => [
                    'type' => 'TIME',
                ],
                'salle_rattrapage' => [
                    'type' => 'VARCHAR',
                    'constraint' => 3,
                ],
                'etat_rattrapage' => [
                    'type' => 'VARCHAR',
                    'constraint' => 15,
                ],
            ];

            $this->forge->addField($fields);
            $this->forge->addKey('id_rattrapage', TRUE); // clé primaire
            $this->forge->addForeignKey('id_ds','ds','id_ds'); // clé étrangère
            $this->forge->createTable($this->table, TRUE);
        }

        // charger les données
        $this->db = \Config\Database::connect();
    }

    // retourne la liste de tous les _rattrapages, triés par nom
    public function get_all()
    {
        return $this->orderBy('id_rattrapage')->findAll();
    }

    // ajoute un _rattrapage défini par un formulaire
    public function ajout()
    {
        // TODO
    }
}