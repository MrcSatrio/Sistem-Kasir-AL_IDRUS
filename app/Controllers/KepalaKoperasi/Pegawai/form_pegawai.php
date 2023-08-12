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
                'id_role' => $this->request->getPost('id_role'),
                'nama_pegawai' => $this->request->getPost('nama_pegawai'),
                'telp_pegawai' => $this->request->getPost('telp_pegawai'),
                'instansi_pegawai' => $this->request->getPost('instansi_pegawai'),
                'alamat_pegawai' => $this->request->getPost('alamat_pegawai'),
            // You can add other fields here based on your table structure
          
        ];
        

        return view('kepalakoperasi/pegawai/insert_pegawai', $data);
    }
}
