<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Faq extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'pertanyaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'jawaban' => [
                'type'       => 'TEXT',
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
        $this->forge->createTable('faq');
    }

    public function down()
    {
        $this->forge->dropTable('faq', true);
    }
}
