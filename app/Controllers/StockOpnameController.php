<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\StockOpnameModel;

class StockOpnameController extends BaseController
{
    // DEKLARASI VARIABLE GLOBAL
    protected $barangModel;
    protected $stockOpnameModel;


    // FUNGSI CONSTRUCT INI DIJALANKAN SETIAP KALI MEMBUAT OBJEK BARU DARI CLASS INI
    public function __construct()
    {
        $this->barangModel      = new BarangModel();
        $this->stockOpnameModel = new StockOpnameModel();
    }


    // FUNGSI INDEX INI DIJALANKAN KETIKA MEMBUKA URL /stok_opname
    public function index()
    {
        $data = [
            'title'       => 'Kelola Stok Opname',
            'subtitle'    => 'Daftar Stock Opname',
            'list_barang' => $this->stockOpnameModel->getStockOpname() // AMBIL SEMUA DATA STOCK Opname DARI DATABASE STOCK Opname
        ];
        return view('stock_opname/index', $data);
    }


    // FUNGSI TAMBAH BARANG INI DIJALANKAN KETIKA MEMBUKA URL /stok_opname/tambah
    public function tambah()
    {

        $data = [
            'title'       => 'Kelola Stok Opname',
            'subtitle'    => 'Tambah Stok Opname',
            'list_barang' => $this->barangModel->getBarang() // AMBIL SEMUA DATA BARANG DARI DATABASE BARANG
        ];
        return view('stock_opname/tambah', $data);
    }


    // FUNGSI TAMBAH BARANG DENGAN METODE POST
    public function tambah_stok_opname()
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

        // INSERT DATA KE TABEL STOCK Opname
        $this->stockOpnameModel->insert($data);
        // SET PESAN SUKSES
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        // ARAHKAN KE HALAMAN STOCK Opname
        return redirect()->to('/stock_opname');
    }
}
