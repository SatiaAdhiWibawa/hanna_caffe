<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangMasuk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'    => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'id_barang'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'foreign_key'    => true
            ],
            'jumlah' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'user_id'            => [
                'type'           => 'INT',
                'constraint'     => 11,
                'foreign_key'    => true
            ],
            'tanggal'            => [
                'type'           => 'DATE',
            ],
            'keterangan'         => [
                'type'           => 'TEXT',
                'null'           => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('barang_masuk');
    }

    public function down()
    {
        $this->forge->dropTable('barang_masuk');
    }
}
