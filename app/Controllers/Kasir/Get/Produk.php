<?php

namespace App\Controllers\Kasir\Get;

use \App\Controllers\BaseController;

class Produk extends BaseController
{
    protected $produkModel;
    protected $brandModel;

    public function index()
    {
        $barcode = $this->request->getVar('barcode');

        $produk = $this->produkModel
            ->join('brand', 'brand.id_brand=produk.id_brand')
            ->where('qr_produk', $barcode)
            ->first();

        if ($produk) {
            $response = [
                'status' => true,
                'data' => $produk
            ];
        } else {
            $response = [
                'status' => false,
                'message' => 'Produk tidak ditemukan.'
            ];
        }

        return $this->response->setJSON($response);
    }
}
