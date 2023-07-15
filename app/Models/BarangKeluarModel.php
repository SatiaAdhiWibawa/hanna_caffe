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
}
