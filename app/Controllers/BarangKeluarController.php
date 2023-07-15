<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\BarangKeluarModel;

class BarangKeluarController extends BaseController
{

    // DEKLARASI VARIABLE GLOBAL
    protected $barangModel;
    protected $barangKeluarModel;


    // FUNGSI CONSTRUCT INI DIJALANKAN SETIAP KALI MEMBUAT OBJEK BARU DARI CLASS INI
    public function __construct()
    {
        $this->barangModel       = new BarangModel();
        $this->barangKeluarModel = new BarangKeluarModel();
    }


    // FUNGSI INDEX INI DIJALANKAN KETIKA MEMBUKA URL /barang
    public function index()
    {
        $barang = $this->barangKeluarModel->findAll();
        foreach ($barang as $value) {
            $idBarang      = $value['id_barang'];
            $list_barang[] = $this->barangKeluarModel->getDataBarangKeluar($idBarang);
        }

        $data = [
            'title'       => 'Kelola Barang Keluar',
            'subtitle'    => 'Daftar Barang Keluar',
            'list_barang' => $list_barang ?? []  // JIKA $list_barang TIDAK ADA MAKA DIISI DENGAN ARRAY KOSONG
        ];
        return view('barang_Keluar/index', $data);
    }


    // FUNGSI TAMBAH BARANG INI DIJALANKAN KETIKA MEMBUKA URL /barang/tambah
    public function tambah()
    {
        $data = [
            'title'       => 'Kelola Barang Keluar',
            'subtitle'    => 'Tambah Barang Keluar',
            'list_barang' => $this->barangModel->getBarang()
        ];
        return view('barang_keluar/tambah', $data);
    }


    // FUNGSI TAMBAH BARANG DENGAN METODE POST
    public function tambah_barang_keluar()
    {
        $session  = session();
        $data = [
            'id_barang' => $this->request->getVar('id_barang'),
            'jumlah'    => $this->request->getVar('jumlah'),
            'user_id'   => $session->get('id'),
            'tanggal'   => $this->request->getVar('tanggal'),
        ];

        // INSERT DATA BARANG Keluar KE DATABASE
        $this->barangKeluarModel->insert($data);

        // TAMBAH STOK BARANG KE DATABASE BARANG
        $this->barangKeluarModel->kurangiStokBarang($data);

        // BUAT FLASHDATA UNTUK MENAMPILKAN ALERT SUCCESS
        session()->setFlashdata('pesan', 'Berhasil menambahkan barang keluar');

        // REDIRECT KE HALAMAN BARANG Keluar
        return redirect()->to(base_url('/barang_keluar'));
    }
}
