<?php

namespace App\Controllers\KepalaKoperasi\Siswa;

use \App\Controllers\BaseController;

class Update extends BaseController
{
    protected $customerModel;
    protected $kartuModel;

    public function UpdateProfile($id)
    {
        if (!$this->request->is('post')) {
            $getCustomer = $this->customerModel->find($id);
            $data = [
                'title' => 'Koperasi - Edit Siswa',
                'siswa' => $getCustomer,
            ];
            return view('kepalakoperasi/siswa/update-profile', $data);
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

    public function UpdateKartu($id) {
        if (!$this->request->is('post')) {
            $getKartu = $this->customerModel
            ->join('kartu', 'kartu.id_kartu = customer.id_kartu')
            ->where('customer.id_customer', $id)
            ->first(); 

            $data = [
                'title' => 'Koperasi - Edit Siswa',
                'kartu' => $getKartu,
            ];
            return view('kepalakoperasi/siswa/update-kartu', $data);
        }
        $rules = $this->customerModel->getValidationRules(['only' => ['']]);
        $rules = $this->kartuModel->getValidationRules(['only' => ['nomor_kartu', 'saldo_kartu']]);

        if (!$this->validate($rules)) {
            session()->setFlashdata('field_errors', $this->validator->listErrors());
            session()->setFlashdata('field_error.nomor_kartu', $this->validator->getError('nomor_kartu'));
            session()->setFlashdata('field_error.saldo_kartu', $this->validator->getError('saldo_kartu'));
            return redirect()->back()->withInput();
        }

        $this->customerModel->save(
            [
                'id_customer' => $id,
            ]
        );

        $this->kartuModel->save(
            [
                'id_kartu' => $id,
                'nomor_kartu' => $this->request->getVar('nomor_kartu'),
                'saldo_kartu' => $this->request->getVar('saldo_kartu'),
            ]
        );

        session()->setFlashdata('success', 'Data berhasil disimpan.');
        return redirect()->back()->withInput();
    }
}
