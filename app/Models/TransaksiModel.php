<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table      = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    protected $allowedFields = [
        'id_transaksi',
        'created_at',
        'updated_at',
        'id_customer',
        'id_pegawai',
        'metode_bayar_transaksi',
        'total_transaksi'
    ];

    // Dates
    protected $useTimestamps = true;

    //validation
    protected $validationRules = [
        'metode_bayar_transaksi'        => 'required|in_list[kartu,cash]'
    ];
    protected $validationMessages = [
        'metode_bayar_transaksi' => [
            'required' => 'Mohon mengisi kolom Metode Bayar',
            'in_list' => 'kartu atau cash'
        ]
    ];
}
