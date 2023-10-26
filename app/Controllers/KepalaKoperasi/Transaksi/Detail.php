<?php

namespace App\Controllers\KepalaKoperasi\Transaksi;

use \App\Controllers\BaseController;
use App\Models\TransaksiModel;

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
    $transaksi = $this->transaksiModel
        ->join('pegawai', 'transaksi.id_pegawai = pegawai.id_pegawai', 'left')
        ->join('customer', 'transaksi.id_customer = customer.id_customer', 'left')
        ->join('transaksi_detail', 'transaksi.id_transaksi = transaksi_detail.id_transaksi', 'left')
        ->join('produk', 'transaksi_detail.qr_produk = produk.qr_produk', 'left')
        ->where('transaksi.id_transaksi', $id_transaksi)
        ->get();

    $data = [];

    // Check if there are results
    if ($transaksi->resultID) {
        foreach ($transaksi->getResultArray() as $tr) {
            $transaksiId = $tr['id_transaksi'];

            if (!array_key_exists($transaksiId, $data)) {
                $data[$transaksiId] = [
                    'id_transaksi' => $tr['id_transaksi'],
                    'nama_customer' => $tr['nama_customer'],
                    'nama_pegawai' => $tr['nama_pegawai'],
                    'metode_bayar_transaksi' => $tr['metode_bayar_transaksi'],
                    'total_transaksi' => $tr['total_transaksi'],
                    'items' => [],
                ];
            }
            $data[$transaksiId]['items'][] = [
                'qr_produk' => $tr['qr_produk'],
                'nama_produk' => $tr['nama_produk'],
                'qty_transaksi' => $tr['qty_transaksi'],
                'jumlah_transaksi' => $tr['jumlah_transaksi'],
            ];
        }
    }

    return view('kepalakoperasi/transaksi/read_detail', ['transaksi' => $data,'title' => 'Koperasi - Detail Transaksi']);
}

    
}    