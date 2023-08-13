<?php

namespace App\Controllers\KepalaKoperasi\Brand;

use \App\Controllers\BaseController;

class Delete extends BaseController
{
    protected $brandModel;

    public function index($id)
    {
        $this->brandModel->where('id_brand', $id)->delete();

        $response = [
            'success' => true,
            'message' => 'Data berhasil dihapus.'
        ];

        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}
