<?php

namespace App\Controllers\KepalaKoperasi\Brand;

use \App\Controllers\BaseController;

class Update extends BaseController
{
    protected $brandModel;

    public function index($id)
    {
        if (!$this->request->is('post')) {
            $getBrand = $this->brandModel->find($id);
            $data =
                [
                    'title'     => 'Koperasi - Edit Brand',
                    'brand'     => $getBrand,
                ];
            return view('kepalakoperasi/brand/update', $data);
        }

        if (!$this->validate($this->brandModel->validationRules)) {
            session()->setFlashdata('field_errors', $this->validator->listErrors());
            session()->setFlashdata('field_error.nama_brand', $this->validator->getError('nama_brand'));
            session()->setFlashdata('field_error.produsen_brand', $this->validator->getError('produsen_brand'));
            return redirect()->back()->withInput();
        }

        $this->brandModel->save(
            [
                'id_brand' => $id,
                'nama_brand' => $this->request->getVar('nama_brand'),
                'produsen_brand' => $this->request->getVar('produsen_brand'),
            ]
        );

        session()->setFlashdata('success', 'Data berhasil disimpan.');
        return redirect()->back()->withInput();
    }
}
