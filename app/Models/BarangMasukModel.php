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


    // FUNGSI DAPATKAN DATA BARANG MASUK JOIN KE TABEL BARANG
    public function getDataBarangMasuk($id)
    {
        $builder = $this->db->table('barang_masuk');
        $builder->select('barang_masuk.*, barang.nama_barang');
        $builder->join('barang', 'barang.id = barang_masuk.id_barang');
        $builder->where('barang_masuk.id', $id);
        return $builder->get()->getRowArray();
    }
}
