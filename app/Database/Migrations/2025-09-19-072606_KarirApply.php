<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KarirApply extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'nama_lengkap' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'alamat_email' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'nomor_telepon' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'pesan' => [
                'type'       => 'TEXT',
            ],
            'upload_file' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'karir_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],

            "created_at datetime default current_timestamp",
            "updated_at datetime NULL",
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('karir_id', 'karir', 'id', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('karir_apply');
    }

    public function down()
    {
        $this->forge->dropTable('karir_apply', true);
    }
}
