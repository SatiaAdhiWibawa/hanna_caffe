<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiMasukModel extends Model
{
    protected $table         = 'transaksi_masuk';
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


    // FUNGSI INI DIGUNAKAN UNTUK MENGAMBIL DATA BARANG MASUK BERDASARKAN ID BARANG LALU JOIN KE TABEL BARANG DAN TABEL USERS UNTUK MENDAPATKAN NAMA BARANG DAN NAMA USER
    public function getDataBarangMasuk($id)
    {
        $builder = $this->db->table('transaksi_masuk');
        $builder->select('transaksi_masuk.*, barang.nama_barang, users.nama_user');
        $builder->join('barang', 'barang.id = transaksi_masuk.id_barang');
        $builder->join('users', 'users.id = transaksi_masuk.user_id');
        $builder->where('transaksi_masuk.id_barang', $id);
        return $builder->get()->getRowArray();
    }
}
