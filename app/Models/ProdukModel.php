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
        'terjual_produk'
    ];

    protected $validationRules = [
        'qr_produk'        => 'required|regex_match[/^\d{13,14}$/]',
        'nama_produk'        => 'required|regex_match[/^[A-Za-z0-9\-_.]+$/]|max_length[32]|is_unique[produk.nama_produk]',
        'produsen_produk'     => 'max_length[32]|alpha_space',
        'uom_produk'     => 'in_list[pcs,pack,dus]',
        'harga_produk'     => 'required|greater_than_equal_to[0]'
    ];
    protected $validationMessages = [
        'qr_produk' => [
            'required' => 'Mohon mengisi kolom QR code',
            'regex_match' => 'QR code invalid'
        ],
        'nama_produk' => [
            'required' => 'Mohon mengisi kolom Nama produk',
            'regex_match' => 'Kolom harus berupa huruf atau angka',
            'max_length' => 'Karakter tidak boleh lebih dari 32 huruf',
            'is_unique' => 'Maaf, produk sudah terdaftar',
        ],
        'produsen_produk' => [
            'alpha_space' => 'Kolom harus berupa huruf',
            'max_length' => 'Karakter tidak boleh lebih dari 32 huruf'
        ],
        'harga_produk' => [
            'required' => 'Harga tidak boleh kosong',
            'greater_than_equal_to' => 'Minimun angka adalah 0'
        ],
    ];
}
