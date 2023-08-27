<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table      = 'customer';
    protected $primaryKey = 'id_customer';

    protected $allowedFields = [
        'id_customer',
        'nama_customer',
        'telp_customer',
        'id_kartu'
    ];

    protected $validationRules = [
        'nama_customer'        => 'required|alpha_space|max_length[32]',
        'telp_customer'     => 'max_length[13]|numeric'
    ];
    protected $validationMessages = [
        'nama_customer' => [
            'required' => 'Mohon mengisi kolom Nama customer',
            'alpha_space' => 'Kolom harus berupa huruf',
            'max_length' => 'Karakter tidak boleh lebih dari 32 huruf',
        ],
        'telp_customer' => [
            'numeric' => 'Kolom harus berupa angka',
            'max_length' => 'Karakter tidak boleh lebih dari 13 angka'
        ],
    ];
}
