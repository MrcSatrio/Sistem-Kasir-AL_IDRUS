<?php

namespace App\Controllers\Kasir\Transaksi;

use \App\Controllers\BaseController;

class Withdraw extends BaseController
{
    protected $kartuModel;
    protected $transaksiModel;
    protected $transaksidetailModel;

    public function index()
    {
        $nama_customer = $this->request->getVar('nama_customer_withdraw');
        $nominal_withdraw = $this->request->getVar('nominal_withdraw');
        $kasir = $this->request->getVar('nama_pegawai_withdraw');

        if (!empty($nama_customer)) {
            $kartu = $this->kartuModel->where('id_kartu', $this->request->getVar('id_kartu_withdraw'))->first();
            $saldo_awal = $kartu['saldo_kartu'];
            $keterangan = "Tarik Tunai Saldo-$nama_customer sebesar $nominal_withdraw";
            $this->kartuModel->save(
                [
                    'id_kartu' => $kartu['id_kartu'],
                    'saldo_kartu' => $saldo_awal - $nominal_withdraw
                ]
            );
            $this->transaksiModel->insert(
                [
                    'id_customer' => $this->request->getVar('id_customer_withdraw'),
                    'id_pegawai' => $this->request->getVar('id_pegawai_withdraw'),
                    'metode_bayar_transaksi' => "cash",
                    'total_transaksi' => $nominal_withdraw
                ]
            );
            $receiptData = [
                'no_transaksi' => $this->transaksiModel->getInsertID(),
                'kasir' => $kasir,
                'customer' => $nama_customer,
                'items' => [],
                'total_transaksi' => $nominal_withdraw,
                'saldo' => $saldo_awal,
                'saldo_sisa' => $saldo_awal + $nominal_withdraw,
                'bayar' => 0,
                'kembalian' => 0,
            ];
            for ($i = 0; $i < 1; $i++) {
                $item = [
                    'keterangan' => $keterangan[$i],
                    'qty' => [$i],
                    'harga' => $nominal_withdraw[$i],
                    'jumlah' => $nominal_withdraw[$i]
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
