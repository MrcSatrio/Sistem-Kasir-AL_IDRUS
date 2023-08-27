<?php

namespace App\Controllers\Kasir\Transaksi;

use \App\Controllers\BaseController;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\CapabilityProfile;
use Mike42\Escpos\Printer;

class ReceiptPrint extends BaseController
{
    public function index()
    {
        $receiptData = session()->get('receiptData');

        if ($receiptData) {
            $profile = CapabilityProfile::load("simple");
            $connector = new WindowsPrintConnector("POS58 Printer");
            $printer = new Printer($connector, $profile);

            $printer->text("        Pondok Pesantren\n");
            $printer->text("      AL-IDRUS  KALIKIDANG\n\n");
            $randomLetters = chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)); // Menghasilkan 3 huruf acak
            $printer->text("No. Transaksi: INV" . $receiptData['no_transaksi'] . $randomLetters . "\n");
            $printer->text("Tgl.Transaksi: " . date('d F Y', strtotime(date('d-m-Y'))) . "\n");
            $printer->text("Kasir        : " . $receiptData['kasir'] . "\n");
            $printer->text("Customer     : " . $receiptData['customer'] . "\n");
            $printer->text("--------------------------------\n");
            $printer->text("Keterangan      Qty Harga Jumlah\n");
            $printer->text("--------------------------------\n");

            for ($i = 0; $i < count($receiptData['items']); $i++) {
                $item = $receiptData['items'][$i];
                $keterangan = $item['keterangan'];
                $line = sprintf("%s\n", $keterangan);

                $hargaStr = $this->formatCurrency($item['harga']);
                $jumlahStr = $this->formatCurrency($item['jumlah']);

                $line .= sprintf("%-4dx %-15s %s\n\n", $item['qty'], $hargaStr, $jumlahStr);
                $printer->text($line);
            }

            $printer->text("--------------------------------\n");
            $printer->text("            Total   : " . $this->formatCurrency($receiptData['total_transaksi']) . "\n");
            $printer->text("            Saldo   : " . $this->formatCurrency($receiptData['saldo']) . "\n");
            $printer->text("            S.Akhir : " . $this->formatCurrency($receiptData['saldo_sisa']) . "\n");
            $printer->text("            Bayar   : " . $this->formatCurrency($receiptData['bayar']) . "\n");
            $printer->text("            Kembali : " . $this->formatCurrency($receiptData['kembalian']) . "\n\n");
            $printer->text("==========TERIMA KASIH==========\n\n");
            $printer->cut();
            $printer->close();
            // session()->remove('receiptData');
        }

        session()->setFlashdata('success', 'Transaksi Berhasil!');
        return redirect()->back()->withInput();
    }

    private function formatCurrency($amount)
    {
        return number_format($amount, 0, ',', '.');
    }
}
