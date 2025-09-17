<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Artikel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'judul_artikel' => [
                'type'       => 'VARCHAR',
                'constraint' => '300',
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'konten' => [
                'type'       => 'TEXT',
            ],
            'penulis' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'tanggal' => [
                'type'       => 'DATE',
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
        $this->forge->createTable('artikel');
    }

    public function down()
    {
        $this->forge->dropTable('artikel', true);
    }
}
