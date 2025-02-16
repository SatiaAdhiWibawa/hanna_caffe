<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriBarangModel;
use CodeIgniter\I18n\Time;

class BarangController extends BaseController
{
    // DEKLARASI VARIABLE GLOBAL
    protected $barangModel;
    protected $KategoriBarangModel;


    // FUNGSI CONSTRUCT INI DIJALANKAN SETIAP KALI MEMBUAT OBJEK BARU DARI CLASS INI
    public function __construct()
    {
        $this->barangModel          = new BarangModel();
        $this->kategoriBarangModel  = new KategoriBarangModel();
    }


    // FUNGSI INDEX INI DIJALANKAN KETIKA MEMBUKA URL /barang
    public function index()
    {
        $data = [
            'title'       => 'Kelola Barang',
            'subtitle'    => 'Daftar Barang',
            'list_barang' => $this->barangModel->getBarang(),
        ];
        return view('barang/index', $data);
    }


    // FUNGSI TAMBAH BARANG INI DIJALANKAN KETIKA MEMBUKA URL /barang/tambah
    public function tambah()
    {
        $data = [
            'title'           => 'Kelola Barang',
            'subtitle'        => 'Tambah Barang',
            'kategori_barang' => $this->kategoriBarangModel->findAll() // AMBIL SEMUA DATA KATEGORI DARI DATABASE KATEGORI
        ];
        return view('barang/tambah', $data);
    }


    // FUNGSI TAMBAH BARANG DENGAN METODE POST
    public function tambah_barang()
    {
        $data = [
            'kode_barang' => $this->request->getVar('kode_barang'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'stok'        => $this->request->getVar('stok'),
            'exp'         => $this->request->getVar('exp'),
            'created_at'  => Time::now('Asia/Jakarta', 'en_US'),
            'updated_at'  => Time::now('Asia/Jakarta', 'en_US')
        ];

        // INSERT DATA BARU KE DATABASE MENGGUNAKAN MODEL
        $this->barangModel->insert($data);
        // BUAT FLASH DATA UNTUK MENAMPILKAN ALERT BERHASIL
        session()->setFlashdata('pesan', 'Data Berhasil Disimpan');
        // ARAHKAN KE HALAMAN BARANG
        return redirect()->to(base_url('barang'));
    }


    // FUNGSI EDIT BARANG INI DIJALANKAN KETIKA MEMBUKA URL /barang/edit
    public function edit($id)
    {
        $data = [
            'title'           => 'Kelola Barang',
            'subtitle'        => 'Edit Barang',
            'kategori_barang' => $this->kategoriBarangModel->findAll(),
            'barang'          => $this->barangModel->getBarang($id),
        ];
        return view('barang/edit', $data);
    }


    // FUNGSI EDIT BARANG DENGAN METODE POST
    public function edit_barang($id)
    {
        $data = [
            'id'          => $id,
            'kode_barang' => $this->request->getVar('kode_barang'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'stok'        => $this->request->getVar('stok'),
            'exp'         => $this->request->getVar('exp'),
            'updated_at'  => Time::now('Asia/Jakarta', 'en_US')
        ];

        // UPDATE DATA BERDASARKAN ID
        $this->barangModel->update($id, $data);
        // BUAT FLASH DATA UNTUK MENAMPILKAN ALERT BERHASIL
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        // ARAHKAN KE HALAMAN BARANG
        return redirect()->to(base_url('barang'));
    }


    // FUNGSI HAPUS BARANG INI DIJALANKAN KETIKA MEMBUKA URL /barang/hapus
    public function hapus_barang($id)
    {
        // HAPUS DATA BERDASARKAN ID
        $this->barangModel->delete($id);
        // BUAT FLASH DATA UNTUK MENAMPILKAN ALERT BERHASIL
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        // ARAHKAN KE HALAMAN BARANG
        return redirect()->to(base_url('barang'));
    }
}
