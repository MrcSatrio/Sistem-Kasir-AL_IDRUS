<?php

namespace App\Controllers\KepalaKoperasi\Brand;

use \App\Controllers\BaseController;

class Create extends BaseController
{
    protected $brandModel;
    protected $kategoriModel;
    protected $pegawaiModel;
    protected $produkModel;

    public function index()
    {
        if (!$this->request->is('post')) {
            $data =
                [
                    'title'     => 'Koperasi - Tambah Brand',
                    'brand'     => $this->brandModel->findAll(),
                    'kategori'  => $this->kategoriModel->findAll(),
                ];
            return view('kepalakoperasi/brand/create', $data);
        }

        if (!$this->validate($this->brandModel->validationRules)) {
            session()->setFlashdata('field_errors', $this->validator->listErrors());
            session()->setFlashdata('field_error.nama_brand', $this->validator->getError('nama_brand'));
            session()->setFlashdata('field_error.produsen_brand', $this->validator->getError('produsen_brand'));
            return redirect()->back()->withInput();
        }

        $this->brandModel->save(
            [
                'nama_brand' => $this->request->getVar('nama_brand'),
                'produsen_brand' => $this->request->getVar('produsen_brand'),
            ]
        );

        session()->setFlashdata('success', 'Data berhasil disimpan.');
        return redirect()->back()->withInput();
    }
}
