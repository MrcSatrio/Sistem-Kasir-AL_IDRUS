<?php

namespace App\Controllers\KepalaKoperasi\Kategori;

use \App\Controllers\BaseController;

class Read extends BaseController
{
    protected $kategoriModel;

    public function index()
    {
        $data =
            [
                'title'     => 'Koperasi - Brand List',
                'kategori'     => $this->kategoriModel->findAll(),
            ];
        return view('kepalakoperasi/kategori/read', $data);
    }
}
