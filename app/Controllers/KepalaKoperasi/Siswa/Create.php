<?php

namespace App\Controllers\KepalaKoperasi\Siswa;

use \App\Controllers\BaseController;

class Create extends BaseController
{
    protected $customerModel;
    protected $kartuModel;

    public function index()
    {
        if (!$this->request->is('post')) {
            $data =
                [
                    'title'     => 'Koperasi - Tambah Customer',
                    'siswa'     => $this->customerModel
                                ->join('kartu', 'kartu.id_kartu = customer.id_kartu')
                                ->where('id_customer', session('id_customer'))
                                ->first(),
                    'kartu'     =>  $this->kartuModel->findAll()
                ];
            return view('kepalakoperasi/siswa/create', $data);
        }

        if (!$this->validate($this->customerModel->validationRules)) {
            session()->setFlashdata('field_errors', $this->validator->listErrors());
            session()->setFlashdata('field_error.nama_customer', $this->validator->getError('nama_customer'));
            session()->setFlashdata('field_error.telp_customer', $this->validator->getError('telp_customer'));
            return redirect()->back()->withInput();
        }

        if (!$this->validate($this->kartuModel->validationRules)) {
            session()->setFlashdata('field_errors', $this->validator->listErrors());
            session()->setFlashdata('field_error.nomor_kartu', $this->validator->getError('nomor_kartu'));
            session()->setFlashdata('field_error.saldo_kartu', $this->validator->getError('saldo_kartu'));
            return redirect()->back()->withInput();
        }


        $this->kartuModel->save(
            [
                'nomor_kartu' => $this->request->getVar('nomor_kartu'),
                'saldo_kartu' => $this->request->getVar('saldo_kartu'),
            ]
        );

        $this->customerModel->save(
            [
                'id_kartu' => $this->kartuModel->getInsertID(),
                'nama_customer' => $this->request->getVar('nama_customer'),
                'telp_customer' => $this->request->getVar('telp_customer'),
            ]
        );

        session()->setFlashdata('success', 'Data berhasil disimpan.');
        return redirect()->back()->withInput();
    }

}
