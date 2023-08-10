<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table      = 'kategori';
    protected $primaryKey = 'id_kategori';

    protected $allowedFields = [
        'id_kategori',
        'nama_kategori'
    ];

    protected $validationRules = [
        'nama_kategori'        => 'required|alpha_space|max_length[32]|is_unique[kategori.nama_kategori]'
    ];
    protected $validationMessages = [
        'nama_kategori' => [
            'required' => 'Mohon mengisi kolom Nama kategori',
            'alpha_space' => 'Kolom harus berupa huruf',
            'max_length' => 'Karakter tidak boleh lebih dari 32 huruf',
            'is_unique' => 'Maaf, kategori sudah terdaftar',
        ]
    ];
}
