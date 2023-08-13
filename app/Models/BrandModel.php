<?php

namespace App\Models;

use CodeIgniter\Model;

class BrandModel extends Model
{
    protected $table      = 'brand';
    protected $primaryKey = 'id_brand';

    protected $allowedFields = [
        'id_brand',
        'nama_brand',
        'produsen_brand'
    ];

    protected $validationRules = [
        'nama_brand'        => 'required|alpha_space|max_length[32]|is_unique[brand.nama_brand]',
        'produsen_brand'     => 'max_length[32]|alpha_numeric_punct'
    ];
    protected $validationMessages = [
        'nama_brand' => [
            'required' => 'Mohon mengisi kolom Nama Brand',
            'alpha_space' => 'Kolom harus berupa huruf',
            'max_length' => 'Karakter tidak boleh lebih dari 32 huruf',
            'is_unique' => 'Maaf, brand sudah terdaftar',
        ],
        'produsen_brand' => [
            'alpha_numeric_punct' => 'Kolom harus berupa huruf',
            'max_length' => 'Karakter tidak boleh lebih dari 32 huruf'
        ],
    ];
}
