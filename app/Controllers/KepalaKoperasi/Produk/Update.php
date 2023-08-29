<?php

namespace App\Controllers\KepalaKoperasi\Produk;

use \App\Controllers\BaseController;

class Update extends BaseController
{
    protected $produkModel;

    public function index($id)
{
    if (!$this->request->is('post')) {
        $getProduk = $this->produkModel
            ->select('produk.*, kategori.nama_kategori, brand.nama_brand')
            ->join('kategori', 'kategori.id_kategori = produk.id_kategori')
            ->join('brand', 'brand.id_brand = produk.id_brand')
            ->where('produk.qr_produk', $id)
            ->first();

        $data = [
            'title' => 'Koperasi - Edit Produk',
            'produk' => $getProduk,
        ];

        return view('kepalakoperasi/produk/update', $data);
        }

        if (!$this->validate($this->produkModel->validationRules)) {
            session()->setFlashdata('field_errors', $this->validator->listErrors());
            session()->setFlashdata('field_error.qr_produk', $this->validator->getError('qr_produk'));
            session()->setFlashdata('field_error.produsen_brand', $this->validator->getError('produsen_brand'));
            session()->setFlashdata('field_error.harga_produk', $this->validator->getError('harga_produk'));
            session()->setFlashdata('field_error.nama_produk', $this->validator->getError('nama_produk'));
            return redirect()->back()->withInput();
        }

        $this->produkModel->save(
            [
                'qr_produk' => $id,
                'harga_produk' => $this->request->getVar('harga_produk'),
            ]
        );

        session()->setFlashdata('success', 'Data berhasil disimpan.');
        return redirect()->back()->withInput();
    }
}
