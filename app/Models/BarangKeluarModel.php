<?php


namespace App\Models;

use CodeIgniter\Model;

class BarangKeluarModel extends Model
{
    protected $table         = 'barang_keluar';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['id_barang', 'jumlah', 'user_id', 'tanggal', 'keterangan'];


    // FUNGSI KURANGI STOK UNTUK MENGURANGI STOK BARANG
    public function kurangiStokBarang($data)
    {
        $builder = $this->db->table('barang');
        $builder->where('id', $data['id_barang']);
        $builder->set('stok', 'stok-' . $data['jumlah'], false);
        $builder->update();
    }

    // FUNGSI DAPATKAN DATA BARANG KELUAR JOIN KE TABEL BARANG
    public function getDataBarangKeluar($id)
    {
        $builder = $this->db->table('barang_keluar');
        $builder->select('barang_keluar.*, barang.nama_barang');
        $builder->join('barang', 'barang.id = barang_keluar.id_barang');
        $builder->where('barang_keluar.id_barang_keluar', $id);
        return $builder->get()->getRowArray();
    }

    public function getDataBarangMasuk($id)
    {
        $builder = $this->db->table('barang_masuk');
        $builder->select('barang_masuk.*, barang.nama_barang');
        $builder->join('barang', 'barang.id = barang_masuk.id_barang');
        $builder->where('barang_masuk.id', $id);
        return $builder->get()->getRowArray();
    }
}
