<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Menu extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'nama_menu' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'level' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'url' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'link' => [
                'type'       => 'VARCHAR',
                'constraint' => '400',
                'default'   => NULL
            ],
            'new_tab' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'default'   => 0
            ],
            'order' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'default'   => 0
            ],
            'publish' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'default'   => 1
            ],
            'parent_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'default'   => NULL
            ],

            "created_at datetime default current_timestamp",
            "updated_at datetime NULL",
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('menu');
    }

    public function down()
    {
        $this->forge->dropTable('menu', true);
    }
}
