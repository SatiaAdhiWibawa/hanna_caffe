<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangMasukModel extends Model
{
    protected $table         = 'barang_masuk';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['id_barang', 'jumlah', 'user_id', 'tanggal', 'keterangan'];


    // FUNGSI TAMBAH BARANG MASUK UNTUK MENAMBAHKAN DATA BARANG MASUK KE KELOLA BARANG
    public function tambahBarangMasuk($data)
    {
        $builder = $this->db->table('barang');
        $builder->where('id', $data['id_barang']);
        $builder->set('stok', 'stok+' . $data['jumlah'], false);
        $builder->update();
    }


    // FUNGSI KURANGI STOK UNTUK MENGURANGI STOK BARANG
    public function kurangiStok($data)
    {
        $builder = $this->db->table('barang');
        $builder->where('id', $data['id_barang']);
        $builder->set('stok', 'stok-' . $data['jumlah'], false);
        $builder->update();
    }
}
