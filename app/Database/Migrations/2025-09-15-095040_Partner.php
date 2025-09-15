<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Partner extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'partner' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'publish' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'default'   => 1
            ],

            "created_at datetime default current_timestamp",
            "updated_at datetime NULL",
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('partner');
    }

    public function down()
    {
        $this->forge->dropTable('partner', true);
    }
}
