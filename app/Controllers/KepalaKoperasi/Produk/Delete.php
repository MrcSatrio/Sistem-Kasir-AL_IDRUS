<?php

namespace App\Controllers\KepalaKoperasi\Produk;

use App\Controllers\BaseController;

class Delete extends BaseController
{
    protected $produkModel;

    public function __construct()
    {
        // Load the Produk model
        $this->produkModel = new \App\Models\ProdukModel();
    }

    public function index($id)
    {
        $product = $this->produkModel->find($id);

        if (!$product) {
            $response = [
                'success' => false,
                'message' => 'Produk tidak ditemukan.'
            ];
        } else {
            // Check for dependent records in transaksi_detail
            $transaksiModel = new \App\Models\TransaksiDetailModel();
            $dependentRecords = $transaksiModel->where('qr_produk', $id)->countAllResults();

            if ($dependentRecords > 0) {
                $response = [
                    'success' => false,
                    'message' => 'Tidak dapat menghapus produk karena terdapat transaksi terkait.'
                ];
            } else {
                // Delete the product
                $this->produkModel->delete($id);

                $response = [
                    'success' => true,
                    'message' => 'Data berhasil dihapus.'
                ];
            }
        }

        return $this->response->setJSON($response);
    }
}
