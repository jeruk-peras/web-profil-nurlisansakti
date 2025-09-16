<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Galeri extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'kategori_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
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
        $this->forge->addForeignKey('kategori_id', 'kategori', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('galeri');
    }

    public function down()
    {
        $this->forge->dropTable('galeri', true);
    }
}
