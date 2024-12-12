<?php 

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Seances extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_seance' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_film' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
                'default'    => null,
            ],
            'date_heure' => [
                'type'       => 'DATETIME',
                'null'       => false,
            ],
            'places_disponibles' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
                'default'    => 50,
            ],
            // Ajouter la colonne 'prix' de type ENUM avec les valeurs 50 et 100
            'prix' => [
                'type'       => 'ENUM',
                'constraint' => ['50', '100'],
                'default'    => '50', // Définir une valeur par défaut, si nécessaire
            ],
        ]);

        $this->forge->addKey('id_seance', true); // Définir `id_seance` comme clé primaire
        $this->forge->createTable('seances');
    }

    public function down()
    {
        // Si vous souhaitez supprimer la colonne 'prix' lors d'une rollback
        $this->forge->dropColumn('seances', 'prix');
    }
}
