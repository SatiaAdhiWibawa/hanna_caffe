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
            'nama_barang'        => [
                'type'           => 'VARCHAR',
                'constraint'     => 100
            ],
            'id_kategori'        => [
                'type'           => 'INT',
                'constraint'     => 11,
                'foreign_key'    => 'kategori(id)',
            ],
            'harga_beli'         => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'harga_jual'         => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'user_id'            => [
                'type'           => 'INT',
                'constraint'     => 11,
                'foreign_key'    => 'users(id)'
            ],
            'quantity'           => [
                'type'           => 'INT',
                'constraint'     => 11
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
        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}
