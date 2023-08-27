<?php

namespace App\Controllers\Kasir\Transaksi;

use \App\Controllers\BaseController;

class Topup extends BaseController
{
    protected $kartuModel;
    protected $transaksiModel;
    protected $transaksidetailModel;
    public function index()
    {
        $nama_customer = $this->request->getVar('nama_customer_topup');
        $nominal_topup = $this->request->getVar('nominal_topup');
        $kasir = $this->request->getVar('nama_pegawai_topup');

        if (!empty($nama_customer)) {
            $kartu = $this->kartuModel->where('id_kartu', $this->request->getVar('id_kartu_topup'))->first();
            $saldo_awal = $kartu['saldo_kartu'];
            $keterangan = "Top-Up ke-$nama_customer sebesar $nominal_topup";
            $this->kartuModel->save(
                [
                    'id_kartu' => $kartu['id_kartu'],
                    'saldo_kartu' => $saldo_awal + $nominal_topup
                ]
            );
            $this->transaksiModel->insert(
                [
                    'id_customer' => $this->request->getVar('id_customer_topup'),
                    'id_pegawai' => $this->request->getVar('id_pegawai_topup'),
                    'metode_bayar_transaksi' => "cash",
                    'total_transaksi' => $nominal_topup
                ]
            );
            // $this->transaksidetailModel->insert(
            //     [
            //         'id_transaksi' => $this->transaksiModel->getInsertID(),
            //         'qr_produk' => $nominal_topup,
            //         'qty_transaksi' => 1,
            //         'jumlah_transaksi' => $nominal_topup
            //     ]
            // );

            $receiptData = [
                'no_transaksi' => $this->transaksiModel->getInsertID(),
                'kasir' => $kasir,
                'customer' => $nama_customer,
                'items' => [],
                'total_transaksi' => $nominal_topup,
                'saldo' => $saldo_awal,
                'saldo_sisa' => $saldo_awal + $nominal_topup,
                'bayar' => 0,
                'kembalian' => 0,
            ];
            for ($i = 0; $i < 1; $i++) {
                $item = [
                    'keterangan' => $keterangan[$i],
                    'qty' => [$i],
                    'harga' => $nominal_topup[$i],
                    'jumlah' => $nominal_topup[$i]
                ];
                $receiptData['items'][] = $item;
            }

            session()->set('receiptData', $receiptData);
            return redirect()->to('kasir/checkout/print');
        } else {
            session()->setFlashdata('topup_errors', 'Kartu harus di scan');
            return redirect()->back()->withInput();
        }
    }
}
