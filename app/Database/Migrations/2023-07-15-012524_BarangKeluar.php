<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangKeluar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_barang_keluar'   => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'id_barang'          => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'jumlah'             => [
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
            ],
        ]);
        $this->forge->addKey('id_barang_keluar', true);
        $this->forge->createTable('barang_keluar');
    }

    public function down()
    {
        $this->forge->dropTable('barang_keluar');
    }
}
