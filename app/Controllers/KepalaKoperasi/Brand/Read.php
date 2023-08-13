<?php

namespace App\Controllers\KepalaKoperasi\Brand;

use \App\Controllers\BaseController;

class Read extends BaseController
{
    protected $brandModel;
    protected $kategoriModel;
    protected $pegawaiModel;
    protected $produkModel;

    public function index()
    {
        $data =
            [
                'title'     => 'Koperasi - Brand List',
            ];
        return view('kepalakoperasi/brand/read', $data);
    }
}
