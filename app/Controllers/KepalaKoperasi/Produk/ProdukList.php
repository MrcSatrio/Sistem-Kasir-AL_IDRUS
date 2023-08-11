<?php

namespace App\Controllers\KepalaKoperasi\Produk;

use \App\Controllers\BaseController;

class ProdukList extends BaseController
{
    public function index()
    {
        $data =
            [
                'title'     => 'Koperasi - List Produk',
            ];
        return view('kepalakoperasi/produk/list_produk', $data);
    }
}
