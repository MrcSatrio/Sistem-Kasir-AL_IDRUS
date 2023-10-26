<?php

namespace App\Controllers\KepalaKoperasi\Siswa;

use \App\Controllers\BaseController;

class Read extends BaseController
{
    protected $customerModel;
    protected $kartuModel;

    public function index()
{
    $siswa = $this->customerModel
        ->join('kartu', 'kartu.id_kartu = customer.id_kartu')
        ->findAll();

    $data = [
        'title' => 'Koperasi - Data Customer',
        'kartu' => $this->kartuModel->findAll(),
        'siswa' => $siswa,
    ];

    return view('kepalakoperasi/siswa/read', $data);
}

}
