<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                 => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true
            ],
            'kode_barang'        => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'nama_barang'        => [
                'type'           => 'VARCHAR',
                'constraint'     => 100
            ],
            'id_kategori'        => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'stok'               => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'exp'                => [
                'type'           => 'DATE',
                'null'           => true
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
        // $this->forge->addForeignKey('id_kategori', 'kategori_barang', 'id');
        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}
