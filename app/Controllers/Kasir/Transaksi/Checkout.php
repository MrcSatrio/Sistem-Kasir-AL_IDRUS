<?php

namespace App\Controllers\Kasir\Transaksi;

use \App\Controllers\BaseController;

class Checkout extends BaseController
{
    protected $transaksiModel;
    protected $transaksidetailModel;
    protected $customerModel;
    protected $kartuModel;
    public function index()
    {
        $id_pegawai = $this->request->getVar('id_pegawai');
        $total_transaksi = $this->request->getVar('total_transaksi');
        $qr_produk = $this->request->getVar('qr_produk[]');
        $keterangan = $this->request->getVar('keterangan[]');
        $qty_transaksi = $this->request->getVar('qty_transaksi[]');
        $harga_produk = $this->request->getVar('harga_produk[]');
        $jumlah_transaksi = $this->request->getVar('jumlah_transaksi[]');

        if (!empty($this->request->getVar('kembalian_transaksi')) || $this->request->getVar('kembalian_transaksi') == 0) {
            $id_customer = null;
            $nama_customer = null;
            $metode_bayar_transaksi = "cash";

            $bayar = $this->request->getVar('bayar_transaksi');
            $kembalian = $this->request->getVar('kembalian_transaksi');
            $saldo = null;
            $saldo_sisa = null;
        } else {
            $id_customer = $this->request->getVar('id_customer');
            $metode_bayar_transaksi = "kartu";

            $bayar = null;
            $kembalian = null;
            $saldo = $this->request->getVar('saldo_kartu');
            $saldo_sisa = $saldo - $total_transaksi;

            $customer = $this->customerModel->find($id_customer);
            $nama_customer = $customer['nama_customer'];
            $this->kartuModel->save(
                [
                    'id_kartu' => $customer['id_kartu'],
                    'saldo_kartu' => $saldo_sisa,
                ]
            );
        }

        $this->transaksiModel->insert(
            [
                'id_customer'   =>  $id_customer,
                'id_pegawai'    =>  $id_pegawai,
                'metode_bayar_transaksi'    =>  $metode_bayar_transaksi,
                'total_transaksi'    =>  $total_transaksi,
            ]
        );

        for ($i = 0; $i < count($qr_produk); $i++) {
            $this->transaksidetailModel->insert([
                'id_transaksi' => $this->transaksiModel->getInsertID(),
                'qr_produk' => $qr_produk[$i],
                'qty_transaksi' => $qty_transaksi[$i],
                'jumlah_transaksi' => $jumlah_transaksi[$i]
            ]);
        }

        $receiptData = [
            'no_transaksi' => $this->transaksiModel->getInsertID(),
            'kasir' => $this->request->getVar('nama_kasir'),
            'customer' => $nama_customer,
            'items' => [],
            'total_transaksi' => $total_transaksi,
            'saldo' => $saldo,
            'saldo_sisa' => $saldo_sisa,
            'bayar' => $bayar,
            'kembalian' => $kembalian,
        ];

        for ($i = 0; $i < count($keterangan); $i++) {
            $item = [
                'keterangan' => $keterangan[$i],
                'qty' => $qty_transaksi[$i],
                'harga' => $harga_produk[$i],
                'jumlah' => $jumlah_transaksi[$i]
            ];
            $receiptData['items'][] = $item;
        }

        session()->set('receiptData', $receiptData);
        return redirect()->to('kasir/checkout/print');
    }
}
