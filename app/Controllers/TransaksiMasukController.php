<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\TransaksiMasukModel;

class TransaksiMasukController extends BaseController
{
    // DEKLARASI VARIABLE GLOBAL
    protected $barangModel;
    protected $transaksiMasukModel;


    // FUNGSI CONSTRUCT INI DIJALANKAN SETIAP KALI MEMBUAT OBJEK BARU DARI CLASS INI
    public function __construct()
    {
        $this->barangModel      = new BarangModel();
        $this->transaksiMasukModel = new TransaksiMasukModel();
    }


    // FUNGSI INDEX INI DIJALANKAN KETIKA MEMBUKA URL /barang
    public function index()
    {
        $barang = $this->transaksiMasukModel->findAll();
        foreach ($barang as $value) {
            $list_barang[] = $this->transaksiMasukModel->getDataBarangMasuk($value['id_barang']); // AMBIL DATA BARANG MASUK BERDASARKAN ID BARANG
        }

        $data = [
            'title'       => 'Kelola Barang Masuk',
            'subtitle'    => 'Daftar Barang Masuk',
            'list_barang' => $list_barang ?? []  // JIKA $list_barang TIDAK ADA MAKA DIISI DENGAN ARRAY KOSONG
        ];
        return view('transaksi_masuk/index', $data);
    }


    // FUNGSI TAMBAH BARANG INI DIJALANKAN KETIKA MEMBUKA URL /barang/tambah
    public function tambah()
    {
        $data = [
            'title'       => 'Kelola Barang Masuk',
            'subtitle'    => 'Tambah Barang Masuk',
            'list_barang' => $this->barangModel->getBarang() // AMBIL SEMUA DATA KATEGORI DARI DATABASE KATEGORI
        ];
        return view('transaksi_masuk/tambah', $data);
    }


    // FUNGSI TAMBAH BARANG DENGAN METODE POST
    public function tambah_transaksi_masuk()
    {
        $session = session();
        $data = [
            'id_barang' => $this->request->getVar('id_barang'),
            'jumlah'    => $this->request->getVar('jumlah'),
            'user_id'   => $session->get('id'),
            'tanggal'   => $this->request->getVar('tanggal'),
        ];

        // INSERT DATA BARANG MASUK KE DATABASE
        $this->transaksiMasukModel->insert($data);

        // TAMBAH STOK BARANG KE DATABASE BARANG
        $this->transaksiMasukModel->tambahBarangMasuk($data);

        // BUAT FLASHDATA UNTUK MENAMPILKAN ALERT SUCCESS
        session()->setFlashdata('pesan', 'Berhasil menambahkan barang masuk');

        // REDIRECT KE HALAMAN BARANG MASUK
        return redirect()->to(base_url('/transaksi_masuk'));
    }
}
