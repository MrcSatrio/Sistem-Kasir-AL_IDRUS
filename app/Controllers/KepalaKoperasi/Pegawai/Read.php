<?php

namespace App\Controllers\KepalaKoperasi\Pegawai;

use \App\Controllers\BaseController;

class Read extends BaseController
{
    protected $pegawaiModel;

    public function index()
    {
        $data =
            [
                'title'     => 'Koperasi - Data pegawai',
                'pegawai'     => $this->pegawaiModel->findAll(),
            ];
        return view('kepalakoperasi/pegawai/read', $data);
    }
}
