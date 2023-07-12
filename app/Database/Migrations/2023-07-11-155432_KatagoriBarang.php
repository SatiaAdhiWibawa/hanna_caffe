<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KatagoriBarang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                 => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true
            ],
            'nama_kategori'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 50
            ],
            'created_at'         => [
                'type'           => 'DATETIME',
                'null'           => true
            ],
            'updated_at'         => [
                'type'           => 'DATETIME',
                'null'           => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kategori_barang');
    }

    public function down()
    {
        $this->forge->dropTable('kategori_barang');
    }
}
