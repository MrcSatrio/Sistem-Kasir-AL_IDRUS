<?php

namespace App\Controllers\KepalaKoperasi\Produk;

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
                    'title'     => 'Koperasi - Tambah Produk',
                    'brand'     => $this->brandModel->findAll(),
                    'kategori'  => $this->kategoriModel->findAll(),
                ];
            return view('kepalakoperasi/produk/create', $data);
        }

        // Ambil aturan validasi dari model
        $validationRules = $this->produkModel->getValidationRules([]);

        // Periksa apakah aturan validasi ada
        if (!$validationRules) {
            session()->setFlashdata('break_the_rules', 'No validation rules found.');
            return redirect()->back()->withInput();
        }

        // Lakukan validasi menggunakan aturan yang diambil dari model
        if (!$this->validate($validationRules)) {
            session()->setFlashdata('break_the_rules', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }


    $this->produkModel->save(
            [
                'qr_produk' => $this->request->getVar('qr_produk'),
                'id_brand' => $this->request->getVar('id_brand'),
                'id_kategori'=>$this->request->getVar('id_kategori'),
                'nama_produk'=>$this->request->getVar('nama_produk'),
                'uom_produk'=> $this->request->getVar('uom_produk'),
                'harga_produk'=>$this->request->getVar('harga_produk'),
            ]
         );
         session()->setFlashdata('success', 'Data berhasil disimpan.');
        return redirect()->back()->withInput();
    }
}