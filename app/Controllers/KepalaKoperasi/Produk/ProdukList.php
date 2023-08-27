<?php

namespace App\Controllers\KepalaKoperasi\Produk;

use \App\Controllers\BaseController;
use App\Models\ProdukModel;

class ProdukList extends BaseController
{
    public function index()
    {
        $data =
            [
                'title'     => 'Koperasi - List Produk',
            ];
        
        $model = new ProdukModel();
        $data['produk'] = $model->findAll();
        return view('kepalakoperasi/produk/list_produk', $data);
    }
}