<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\BarangModel;
use App\Models\StockOpnameModel;

class LaporanController extends BaseController
{
    // DEKLARASI VARIABLE GLOBAL
    protected $usersModel;
    protected $barangModel;
    protected $stockOpnameModel;


    // FUNGSI CONSTRUCT INI DIJALANKAN SETIAP KALI MEMBUAT OBJEK BARU DARI CLASS INI
    public function __construct()
    {
        $this->usersModel       = new UsersModel();
        $this->barangModel      = new BarangModel();
        $this->stockOpnameModel = new StockOpnameModel();
    }


    // FUNGSI INDEX INI DIJALANKAN KETIKA MEMBUKA URL /laporan
    public function index()
    {
        $data = [
            'title'      => 'Kelola Laporan',
            'subtitle'   => 'Laporan Stock Opname',
            "list_table" => $this->stockOpnameModel->getStockOpname()
        ];
        return view('laporan/index', $data);
    }


    // FUNGSI INI DIJALANKAN KETIKA MEMBUKA URL /laporan/harian
    public function download_harian()
    {
        $tanggal = $this->request->getVar('tanggal_download');
        // AMBIL DATA STOCK OF NAME JOIN id_barang DARI TANGGAL BARANG AMBIL nama_barang
        $dataStockOpname = $this->stockOpnameModel->where("tanggal", $tanggal)->findAll();

        // JIKA DATA TIDAK DITEMUKAN
        if (empty($dataStockOpname)) {
            session()->setFlashdata('pesan', 'Data Tidak ditemukan pada tanggal yang dipilih');
            return redirect()->to(base_url('laporan'));
        }

        foreach ($dataStockOpname as $key => $value) {
            // AMBIL NAMA BARANG DARI ID BARANG YANG ADA DI DATA STOCK OF NAME
            $dataStockOpname[$key]['nama_barang'] = $this->barangModel->find($value['id_barang'])['nama_barang'];
            // AMBIL NAMA USER DARI ID USER YANG ADA DI DATA STOCK OF NAME
            $dataStockOpname[$key]['nama_user']   = $this->usersModel->find($value['user_id'])['nama_user'];
        }

        $data = [
            'title'         => 'Cetak Data Laporan Harian',
            'laporan_tabel' => $dataStockOpname,
        ];
        return view('laporan/cetak_laporan_harian', $data);
    }
}
