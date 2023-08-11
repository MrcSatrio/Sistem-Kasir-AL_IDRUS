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

        d(
            [
                $this->request->getVar('bar_produk'),
                $this->request->getVar('id_brand'),
                $this->request->getVar('id_kategori'),
                $this->request->getVar('nama_produk'),
                $this->request->getVar('uom_produk'),
                $this->request->getVar('harga_produk'),
            ]
        );

        // sengaja di komen biar ga masuk database
        // $this->produkModel->save(
        //     [
        //         $this->request->getVar('bar_produk'),
        //         $this->request->getVar('id_brand'),
        //         $this->request->getVar('id_kategori'),
        //         $this->request->getVar('nama_produk'),
        //         $this->request->getVar('uom_produk'),
        //         $this->request->getVar('harga_produk'),
        //     ]
        // );
    }
}
