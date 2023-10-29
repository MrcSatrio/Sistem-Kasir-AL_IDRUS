<?php

namespace App\Controllers\KepalaKoperasi\Produk;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class Update extends BaseController
{
    protected $produkModel;
    protected $kategoriModel;
    protected $brandModel;

    public function index($id)
    {
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

    public function update()
{
    // Ambil data dari permintaan POST
    $nama_produk = $this->request->getPost('nama_produk');
    $harga_produk = $this->request->getPost('harga_produk');
    $harga_beli = $this->request->getPost('harga_beli');
    $stok = $this->request->getPost('stok');
    $id_kategori = $this->request->getPost('id_kategori');
    $id_brand = $this->request->getPost('id_brand');
    $qr_produk = $this->request->getPost('qr_produk');

    // Debug: Cetak data yang diambil dari permintaan POST
    var_dump($nama_produk);
    var_dump($harga_produk);
    var_dump($harga_beli);
    var_dump($stok);
    var_dump($id_kategori);
    var_dump($id_brand);
    var_dump($qr_produk);

    // Temukan data produk berdasarkan ID (qr_produk)
    $produk = $this->produkModel->find($qr_produk);

    if ($produk) {
        // Update data produk dengan data dari permintaan POST
        $dataToUpdate = [
            'nama_produk' => $nama_produk,
            'harga_produk' => $harga_produk,
            'harga_beli' => $harga_beli,
            'stok' => $stok,
            'id_kategori' => $id_kategori,
            'id_brand' => $id_brand,
        ];

        $this->produkModel->update($produk['qr_produk'], $dataToUpdate);

        session()->setFlashdata('success', 'Produk berhasil diperbarui.');
    } else {
        session()->setFlashdata('error', 'Produk tidak ditemukan.');
    }

    return redirect()->back();
}


    
}
