<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiDetailModel extends Model
{
    protected $table      = 'transaksi_detail';
    protected $primaryKey = 'id_transaksi';

    protected $useAutoIncrement = false;

    protected $allowedFields = [
        'id_transaksi',
        'qr_produk',
        'qty_transaksi',
        'jumlah_transaksi'
    ];
}
