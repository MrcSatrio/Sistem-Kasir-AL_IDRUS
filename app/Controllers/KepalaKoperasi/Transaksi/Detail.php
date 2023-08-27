<?php

namespace App\Controllers\KepalaKoperasi\Transaksi;

use \App\Controllers\BaseController;

class Detail extends BaseController
{
    protected $customerModel;
    protected $kartuModel;
    protected $produkModel;
    protected $pegawaiModel;
    protected $transaksiModel;
    protected $transaksidetailModel;
    protected $kategoriModel;
    protected $brandModel;


    public function index($id_transaksi)
{
    $transaksiModel = new \App\Models\TransaksiModel();

    $transaksi = $transaksiModel
        ->join('transaksi_detail', 'transaksi_detail.id_transaksi = transaksi.id_transaksi')
        ->join('produk', 'produk.qr_produk = transaksi_detail.qr_produk')
        ->join('pegawai', 'pegawai.id_pegawai = transaksi.id_pegawai')
        ->join('customer', 'customer.id_customer = transaksi.id_customer')
        ->where('transaksi.id_transaksi', $id_transaksi)
        ->get()
        ->getResult(); // Anda perlu menggunakan get() dan getResult() untuk mendapatkan hasil query

    $data = [
        'title' => 'Koperasi - Data Siswa',
        'kartu' => $this->kartuModel->findAll(),
        'transaksi' => $transaksi,
    ];

    return view('kepalakoperasi/transaksi/read_detail', $data);
}
}