<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\StockOfnameModel;

class StockOfnameController extends BaseController
{
    // DEKLARASI VARIABLE GLOBAL
    protected $barangModel;
    protected $stockOfnameModel;

    // FUNGSI CONSTRUCT INI DIJALANKAN SETIAP KALI MEMBUAT OBJEK BARU DARI CLASS INI
    public function __construct()
    {
        $this->barangModel      = new BarangModel();
        $this->stockOfnameModel = new StockOfnameModel();
    }

    // FUNGSI INDEX INI DIJALANKAN KETIKA MEMBUKA URL /stok_ofname
    public function index()
    {
        $data = [
            'title'       => 'Kelola Stok Ofname',
            'subtitle'    => 'Daftar Stock Ofname',
            'list_barang' => $this->stockOfnameModel->getStockOfname() // AMBIL SEMUA DATA STOCK OFNAME DARI DATABASE STOCK OFNAME
        ];
        return view('stock_ofname/index', $data);
    }

    // FUNGSI TAMBAH BARANG INI DIJALANKAN KETIKA MEMBUKA URL /stok_ofname/tambah
    public function tambah()
    {

        $data = [
            'title'       => 'Kelola Stok Ofname',
            'subtitle'    => 'Tambah Stok Ofname',
            'list_barang' => $this->barangModel->getBarang() // AMBIL SEMUA DATA BARANG DARI DATABASE BARANG
        ];
        return view('stock_ofname/tambah', $data);
    }

    // FUNGSI TAMBAH BARANG DENGAN METODE POST
    public function tambah_stok_ofname()
    {
        $session    = session();
        $userId     = $session->get('id');
        $idBarang   = $this->request->getVar('id_barang');
        $jumlah     = $this->request->getVar('jumlah');
        $stokBarang = $this->barangModel->select('stok')->find($idBarang); // AMBIL DATA STOK DARI DATABASE BARANG BERDASARKAN ID BARANG
        $selisih    = $jumlah - $stokBarang['stok'];

        $data = [
            'id_barang'  => $idBarang,
            'jumlah'     => $jumlah,
            'user_id'    => $userId,
            'tanggal'    => $this->request->getVar('tanggal'),
            'selisih'    => (int)$selisih,
            'keterangan' => $this->request->getVar('keterangan')
        ];

        // INSERT DATA KE TABEL STOCK OFNAME
        $this->stockOfnameModel->insert($data);
        // SET PESAN SUKSES
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        // ARAHKAN KE HALAMAN STOCK OFNAME
        return redirect()->to('/stock_ofname');
    }
}
