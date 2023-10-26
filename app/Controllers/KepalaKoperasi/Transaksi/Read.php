<?php

namespace App\Controllers\KepalaKoperasi\Transaksi;

use \App\Controllers\BaseController;

class Read extends BaseController
{
    protected $customerModel;
    protected $kartuModel;
    protected $produkModel;
    protected $pegawaiModel;
    protected $transaksiModel;
    protected $transaksidetailModel;
    protected $kategoriModel;
    protected $brandModel;


    public function index()
{
    $transaksi = $this->transaksiModel
        ->select('transaksi.*, pegawai.nama_pegawai, customer.nama_customer')
        ->join('pegawai', 'transaksi.id_pegawai = pegawai.id_pegawai', 'left')
        ->join('customer', 'transaksi.id_customer = customer.id_customer', 'left')
        ->findAll();

    // Lakukan pengecekan dan gantilah jika data customer null
    foreach ($transaksi as &$tr) {
        if ($tr['nama_customer'] === null) {
            $tr['nama_customer'] = 'Non Member';
        }
    }

    $data = [
        'title' => 'Koperasi - Data Siswa',
        'kartu' => $this->kartuModel->findAll(),
        'transaksi' => $transaksi,
    ];

    return view('kepalakoperasi/transaksi/read', $data);
}

}