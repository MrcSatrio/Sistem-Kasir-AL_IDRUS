<?php

namespace App\Controllers\KepalaKoperasi\Kategori;

use \App\Controllers\BaseController;

class Update extends BaseController
{
    protected $kategoriModel;

    public function index($id)
    {
        if (!$this->request->is('post')) {
            $getKategori = $this->kategoriModel->find($id);
            $data =
                [
                    'title'     => 'Koperasi - Edit Kategori',
                    'kategori'     => $getKategori,
                ];
            return view('kepalakoperasi/kategori/update', $data);
        }

        if (!$this->validate($this->kategoriModel->validationRules)) {
            session()->setFlashdata('field_errors', $this->validator->listErrors());
            session()->setFlashdata('field_error.nama_kategori', $this->validator->getError('nama_kategori'));
            return redirect()->back()->withInput();
        }

        $this->kategoriModel->save(
            [
                'id_kategori' => $id,
                'nama_kategori' => $this->request->getVar('nama_kategori'),
            ]
        );

        session()->setFlashdata('success', 'Data berhasil disimpan.');
        return redirect()->back()->withInput();
    }
}
