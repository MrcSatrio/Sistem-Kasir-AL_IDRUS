<?php

namespace App\Controllers\KepalaKoperasi\Produk;

use App\Controllers\BaseController;

class Update extends BaseController
{
    protected $produkModel;
    protected $kategoriModel;
    protected $brandModel;

    public function index($id)
    {
        // Periksa jika permintaan bukan metode POST
        if (!$this->request->is('post')) {
            $getproduk = $this->produkModel
            ->join('kategori', 'kategori.id_kategori = produk.id_kategori')
            ->find($id);
            $getkategori = $this->kategoriModel->findAll();
            $getbrand = $this->brandModel->findAll();
            $data = [
                'title' => 'Koperasi - Edit Kategori',
                'produk' => $getproduk,
                'kategoriList' => $getkategori,
                'brandList' => $getbrand
            ];
            return view('kepalakoperasi/produk/update', $data);
        }
        
        // Aturan validasi hanya untuk 'harga_produk'
        $rules = [
            'harga_produk' => 'required|greater_than_equal_to[0]',
            'id_kategori' => 'required',
            'id_brand' => 'required',
            'id_brand' => 'required',
            'nama_produk' => 'required|alpha_numeric_punct|max_length[32]'
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('field_errors', $this->validator->listErrors());
            session()->setFlashdata('field_errors.harga_produk', $this->validator->getError('harga_produk'));
            session()->setFlashdata('field_errors.id_kategori', $this->validator->getError('id_kategori'));
            session()->setFlashdata('field_errors.id_brand', $this->validator->getError('id_brand'));
            session()->setFlashdata('field_errors.nama_produk', $this->validator->getError('nama_produk'));
            return redirect()->back()->withInput();
        }

        // Simpan perubahan pada produk
        $newKategori = $this->request->getVar('id_kategori');
        $newHarga = $this->request->getVar('harga_produk');
        $newBrand = $this->request->getVar('id_brand');
        $newNama = $this->request->getVar('nama_produk');
        $dataToUpdate = [
            'harga_produk' => $newHarga,
            'id_kategori' => $newKategori,
            'id_brand' => $newBrand,
            'nama_produk' => $newNama
        ];
        
        $this->produkModel->update($id, $dataToUpdate);
        

        // Simpan pesan sukses dalam session
        session()->setFlashdata('success', 'Data berhasil disimpan.');
        return redirect()->back()->withInput();
    }
}
