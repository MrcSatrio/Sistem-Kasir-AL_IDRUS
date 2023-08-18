<?php

namespace App\Controllers\KepalaKoperasi\Siswa;

use \App\Controllers\BaseController;

class Delete extends BaseController
{
    protected $customerModel;
    protected $kartuModel;

    public function index($id)
{
    $result = $this->customerModel
        ->where('customer.id_customer', $id)
        ->first();

    if ($result) {
        $this->customerModel->delete($id);
        $this->kartuModel->delete($result['id_kartu']);

        $response = [
            'success' => true,
            'message' => 'Data berhasil dihapus.'
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Data customer tidak ditemukan.'
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
}
