<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Films extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_film' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nom_film' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'genre' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
                'default'    => null,
            ],
            'duree' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
                'default'    => null,
            ],
            'affiche' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'default'    => null,
            ],
        ]);

        $this->forge->addKey('id_film', true); // Définir `id_film` comme clé primaire
        $this->forge->createTable('films');
    }

    public function down()
    {
        //
    }
}
