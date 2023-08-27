<?php

namespace App\Controllers\Kasir\Get;

use \App\Controllers\BaseController;

class Member extends BaseController
{
    protected $customerModel;
    protected $kartuModel;

    public function index()
    {
        $nomor_kartu = $this->request->getVar('nomor_kartu');

        $customer = $this->customerModel
            ->join('kartu', 'kartu.id_kartu=customer.id_kartu')
            ->where('kartu.nomor_kartu', $nomor_kartu)
            ->first();

        if ($customer) {
            $response = [
                'status' => true,
                'data' => $customer
            ];
        } else {
            $response = [
                'status' => false,
                'message' => 'Member tidak ditemukan.'
            ];
        }

        return $this->response->setJSON($response);
    }
}
