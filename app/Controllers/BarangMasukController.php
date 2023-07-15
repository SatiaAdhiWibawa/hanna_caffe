<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\BarangMasukModel;

class BarangMasukController extends BaseController
{

    // DEKLARASI VARIABLE GLOBAL
    protected $barangModel;
    protected $barangMasukModel;


    // FUNGSI CONSTRUCT INI DIJALANKAN SETIAP KALI MEMBUAT OBJEK BARU DARI CLASS INI
    public function __construct()
    {
        $this->barangModel      = new BarangModel();
        $this->barangMasukModel = new BarangMasukModel();
    }


    // FUNGSI INDEX INI DIJALANKAN KETIKA MEMBUKA URL /barang
    public function index()
    {
        $barang = $this->barangMasukModel->findAll();
        foreach ($barang as $value) {
            $idBarang      = $value['id_barang'];
            $list_barang[] = $this->barangMasukModel->getDataBarangMasuk($idBarang);
        }

        $data = [
            'title'       => 'Kelola Barang Masuk',
            'subtitle'    => 'Daftar Barang Masuk',
            'list_barang' => $list_barang ?? []
        ];
        return view('barang_masuk/index', $data);
    }


    // FUNGSI TAMBAH BARANG INI DIJALANKAN KETIKA MEMBUKA URL /barang/tambah
    public function tambah()
    {
        $data = [
            'title'       => 'Kelola Barang Masuk',
            'subtitle'    => 'Tambah Barang Masuk',
            'list_barang' => $this->barangModel->getBarang()
        ];
        return view('barang_masuk/tambah', $data);
    }


    // FUNGSI TAMBAH BARANG DENGAN METODE POST
    public function tambah_barang_masuk()
    {
        $session = session();
        $data = [
            'id_barang' => $this->request->getVar('id_barang'),
            'jumlah'    => $this->request->getVar('jumlah'),
            'user_id'   => $session->get('id'),
            'tanggal'   => $this->request->getVar('tanggal'),
        ];

        // INSERT DATA BARANG MASUK KE DATABASE
        $this->barangMasukModel->insert($data);

        // TAMBAH STOK BARANG KE DATABASE BARANG
        $this->barangMasukModel->tambahBarangMasuk($data);

        // BUAT FLASHDATA UNTUK MENAMPILKAN ALERT SUCCESS
        session()->setFlashdata('pesan', 'Berhasil menambahkan barang masuk');

        // REDIRECT KE HALAMAN BARANG MASUK
        return redirect()->to(base_url('/barang_masuk'));
    }
}
