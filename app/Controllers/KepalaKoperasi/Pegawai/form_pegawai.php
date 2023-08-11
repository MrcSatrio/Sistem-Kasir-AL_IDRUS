<?php

namespace App\Controllers\KepalaKoperasi\Pegawai;

use \App\Controllers\BaseController;

class Form_pegawai extends BaseController
{
    protected $pegawaiModel;

    public function index()
    {
        $data =
            [
                'title'     => 'form -> pegawai',
            ];
        return view('kepalakoperasi/pegawai/insert_pegawai', $data);
    }
}
