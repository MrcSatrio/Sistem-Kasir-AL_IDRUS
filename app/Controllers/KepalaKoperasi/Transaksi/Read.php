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
    $dateFrom = $this->request->getVar('dateFrom');
    $dateTo = $this->request->getVar('dateTo');

    // Buat instance model
    $transaksiModel = new \App\Models\TransaksiModel();


    // Lakukan filter berdasarkan tanggal jika ada nilai yang diberikan
    if ($dateFrom && $dateTo) {
        $transaksiModel->where("created_at BETWEEN '$dateFrom' AND '$dateTo'");
    }

    $transaksi = $transaksiModel
        ->join('transaksi_detail', 'transaksi_detail.id_transaksi = transaksi.id_transaksi')
        ->join('pegawai', 'pegawai.id_pegawai = transaksi.id_pegawai')
        ->join('customer', 'customer.id_customer = transaksi.id_customer')
        ->findAll();

    $data = [
        'title' => 'Koperasi - Data Siswa',
        'kartu' => $this->kartuModel->findAll(),
        'transaksi' => $transaksi,
    ];

    return view('kepalakoperasi/transaksi/read', $data);
}
}