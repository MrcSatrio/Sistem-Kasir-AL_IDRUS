<?php

namespace App\Controllers\KepalaKoperasi\Brand;

use \App\Controllers\BaseController;

class Create extends BaseController
{
    protected $brandModel;
    protected $kategoriModel;
    protected $pegawaiModel;
    protected $produkModel;

    public function index()
    {
        if (!$this->request->is('post')) {
            $data =
                [
                    'title'     => 'Koperasi - Tambah Produk',
                    'brand'     => $this->brandModel->findAll(),
                    'kategori'  => $this->kategoriModel->findAll(),
                ];
            return view('kepalakoperasi/brand/create', $data);
        }
    }
}
