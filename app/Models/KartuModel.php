<?php

namespace App\Models;

use CodeIgniter\Model;

class KartuModel extends Model
{
    protected $table      = 'kartu';
    protected $primaryKey = 'id_kartu';

    protected $allowedFields = [
        'id_kartu',
        'nomor_kartu',
        'saldo_kartu'
    ];

    protected $validationRules = [
        'nomor_kartu'        => 'required|numeric|max_length[10]|is_unique[kartu.nomor_kartu]|greater_than_equal_to[0]',
        'saldo_kartu'     => 'integer'
    ];
    protected $validationMessages = [
        'nomor_kartu' => [
            'required' => 'Mohon mengisi kolom nomor kartu',
            'numeric' => 'Kolom harus berupa angka',
            'max_length' => 'Karakter tidak boleh lebih dari 10 angka',
            'is_unique' => 'Maaf, kartu sudah terdaftar',
            'greater_than_equal_to' => 'Minimum angka adalah 0'
        ],
        'saldo_kartu' => [
            'integer' => 'Kolom harus berupa angka'
        ],
    ];
}
