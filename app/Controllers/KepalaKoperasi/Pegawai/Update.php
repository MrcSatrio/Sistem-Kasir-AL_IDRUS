<?php

namespace App\Controllers\KepalaKoperasi\Pegawai;

use \App\Controllers\BaseController;

class Update extends BaseController
{
    protected $pegawaiModel;

    public function index($id)
    {
        if (!$this->request->is('post')) {
            $getPegawai = $this->pegawaiModel->find($id);
            $data =
                [
                    'title'     => 'Koperasi - Edit Pegawai',
                    'pegawai'   => $getPegawai,
                ];
            return view('kepalakoperasi/pegawai/update', $data);
        }

        $rules = $this->pegawaiModel->getValidationRules(['only' => ['nama_pegawai','telp_pegawai','alamat_pegawai']]);

        if (!$this->validate($rules)) {
            session()->setFlashdata('field_errors', $this->validator->listErrors());
            session()->setFlashdata('field_error.nama_pegawai', $this->validator->getError('nama_pegawai'));
            session()->setFlashdata('field_error.telp_pegawai', $this->validator->getError('telp_pegawai'));
            session()->setFlashdata('field_error.alamat_pegawai', $this->validator->getError('alamat_pegawai'));
            return redirect()->back()->withInput();
        }

        $this->pegawaiModel->save(
            [
                'id_pegawai' => $id,
                'nama_pegawai' => $this->request->getVar('nama_pegawai'),
                'telp_pegawai' => $this->request->getVar('telp_pegawai'),
                'alamat_pegawai' => $this->request->getVar('alamat_pegawai'),
            ]
        );

        session()->setFlashdata('success', 'Data berhasil disimpan.');
        return redirect()->back()->withInput();
    }
}
