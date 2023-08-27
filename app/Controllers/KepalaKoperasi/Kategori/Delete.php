<?php

namespace App\Controllers\KepalaKoperasi\Kategori;

use \App\Controllers\BaseController;

class Delete extends BaseController
{
    protected $kategoriModel;

    public function index($id)
    {
        $this->kategoriModel->where('id_kategori', $id)->delete();

        $response = [
            'success' => true,
            'message' => 'Data berhasil dihapus.'
        ];

        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}
