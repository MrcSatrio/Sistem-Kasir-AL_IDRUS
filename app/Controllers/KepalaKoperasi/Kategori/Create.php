<?php

namespace App\Controllers\KepalaKoperasi\Kategori;

use \App\Controllers\BaseController;

class Create extends BaseController
{
    protected $kategoriModel;

    public function index()
    {
        if (!$this->request->is('post')) {
            $data =
                [
                    'title'     => 'Koperasi - Tambah Kategori',
                ];
            return view('kepalakoperasi/kategori/create', $data);
        }

        if (!$this->validate($this->kategoriModel->validationRules)) {
            session()->setFlashdata('field_errors', $this->validator->listErrors());
            session()->setFlashdata('field_error.nama_kategori', $this->validator->getError('nama_kategori'));
            return redirect()->back()->withInput();
        }

        $this->kategoriModel->save(
            [
                'nama_kategori' => $this->request->getVar('nama_kategori'),
            ]
        );

        session()->setFlashdata('success', 'Data berhasil disimpan.');
        return redirect()->back()->withInput();
    }
}
