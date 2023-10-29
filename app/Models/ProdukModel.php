<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table      = 'produk';
    protected $primaryKey = 'qr_produk';

    protected $useAutoIncrement = false;

    protected $allowedFields = [
        'qr_produk',
        'id_kategori',
        'id_brand',
        'nama_produk',
        'uom_produk',
        'harga_produk',
        'terjual_produk',
        'stok',
        'harga_beli'
    ];
}
