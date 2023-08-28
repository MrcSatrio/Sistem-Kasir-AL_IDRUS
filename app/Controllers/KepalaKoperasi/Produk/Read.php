<?php

namespace App\Controllers\KepalaKoperasi\Produk;

use \App\Controllers\BaseController;

class Read extends BaseController
{
    protected $produkModel;

    public function index()
    {
        $produk =  $this->produkModel
        ->join('kategori', 'kategori.id_kategori = produk.id_kategori')
        ->join('brand', 'brand.id_brand = produk.id_brand')
        ->findAll();
        $data =
            [
                'title'     => 'Koperasi - List Produk',
                'produk' => $produk
            ];
        return view('kepalakoperasi/produk/read', $data);
    }
}