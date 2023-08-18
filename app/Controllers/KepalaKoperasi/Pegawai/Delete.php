<?php

namespace App\Controllers\KepalaKoperasi\Pegawai;

use \App\Controllers\BaseController;

class Delete extends BaseController
{
    protected $pegawaiModel;

    public function index($id)
    {
        $this->pegawaiModel->where('id_pegawai', $id)->delete();

        $response = [
            'success' => true,
            'message' => 'Data berhasil dihapus.'
        ];

        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}
