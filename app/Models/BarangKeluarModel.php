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


    // FUNGSI INI DIGUNAKAN UNTUK MENGAMBIL DATA BARANG KELUAR BERDASARKAN ID BARANG LALU JOIN KE TABEL BARANG DAN TABEL USERS UNTUK MENDAPATKAN NAMA BARANG DAN NAMA USER
    public function getDataBarangKeluar($id)
    {
        $builder = $this->db->table('barang_keluar');
        $builder->select('barang_keluar.*, barang.nama_barang, users.nama_user');
        $builder->join('barang', 'barang.id = barang_keluar.id_barang');
        $builder->join('users', 'users.id = barang_keluar.user_id');
        $builder->where('barang_keluar.id_barang', $id);
        return $builder->get()->getRowArray();
    }
}
