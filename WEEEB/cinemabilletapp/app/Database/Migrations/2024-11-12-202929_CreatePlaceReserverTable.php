<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePlaceReserverTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_seance' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'place_numero' => [
                'type' => 'INT',
            ],
            'reserved_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_seance', 'seances', 'id_seance', 'CASCADE', 'CASCADE');
        $this->forge->createTable('place_reserver');
    }
    
    public function down()
    {
        $this->forge->dropTable('place_reserver');
    }
}
