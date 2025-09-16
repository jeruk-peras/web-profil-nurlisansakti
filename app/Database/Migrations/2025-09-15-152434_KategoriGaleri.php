<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KategoriGaleri extends Migration
{
   public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],

            "created_at datetime default current_timestamp",
            "updated_at datetime NULL",
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kategori');
    }

    public function down()
    {
        $this->forge->dropTable('kategori', true);
    }
}
