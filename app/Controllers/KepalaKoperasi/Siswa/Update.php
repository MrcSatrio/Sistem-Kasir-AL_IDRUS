<?php

namespace App\Controllers\KepalaKoperasi\Siswa;

use \App\Controllers\BaseController;

class Update extends BaseController
{
    protected $customerModel;
    protected $kartuModel;

    public function index($id)
    {
        if (!$this->request->is('post')) {
            $getCustomer = $this->customerModel->find($id);
            $data = [
                'title' => 'Koperasi - Edit Siswa',
                'siswa' => $getCustomer,
            ];
            return view('kepalakoperasi/siswa/update', $data);
        }
        

        if (!$this->validate($this->customerModel->validationRules)) {
            session()->setFlashdata('field_errors', $this->validator->listErrors());
            session()->setFlashdata('field_error.nama_customer', $this->validator->getError('nama_customer'));
            session()->setFlashdata('field_error.telp_customer', $this->validator->getError('telp_customer'));
            return redirect()->back()->withInput();
        }


        $this->customerModel->save(
            [
                'id_customer' => $id,

                'nama_customer' => $this->request->getVar('nama_customer'),
                'telp_customer' => $this->request->getVar('telp_customer'),
            ]
        );

        session()->setFlashdata('success', 'Data berhasil disimpan.');
        return redirect()->back()->withInput();
    }
}
