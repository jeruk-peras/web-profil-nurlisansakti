<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Karir extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'karir' => [
                'type'       => 'VARCHAR',
                'constraint' => '300',
            ],
            'konten' => [
                'type'       => 'TEXT',
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'deskripsi' => [
                'type'       => 'VARCHAR',
                'constraint' => '300',
                'default'   => null
            ],
            'kata_kunci' => [
                'type'       => 'VARCHAR',
                'constraint' => '300',
                'default'   => null
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
        $this->forge->createTable('karir');
    }

    public function down()
    {
        $this->forge->dropTable('karir', true);
    }
}
