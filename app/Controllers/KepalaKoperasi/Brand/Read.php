<?php

namespace App\Controllers\KepalaKoperasi\Brand;

use \App\Controllers\BaseController;

class Read extends BaseController
{
    protected $brandModel;

    public function index()
    {
        $data =
            [
                'title'     => 'Koperasi - Brand List',
                'brand'     => $this->brandModel->findAll(),
            ];
        return view('kepalakoperasi/brand/read', $data);
    }
}
