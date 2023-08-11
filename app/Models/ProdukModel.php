<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table      = 'produk';
    protected $primaryKey = 'bar_produk';

    protected $useAutoIncrement = false;

    protected $allowedFields = [
        'bar_produk',
        'id_kategori',
        'id_brand',
        'nama_produk',
        'uom_produk',
        'harga_produk',
        'terjual_produk'
    ];

    protected $validationRules = [
        'bar_produk'        => 'required|regex_match[/^\d{13,14}$/]',
        'id_kategori'        => 'required',
        'id_brand'        => 'required',
        'nama_produk'        => 'required|alpha_numeric_punct|max_length[32]|is_unique[produk.nama_produk]',
        'uom_produk'     => 'in_list[pcs,pack,dus]',
        'harga_produk'     => 'required|greater_than_equal_to[0]'
    ];
    protected $validationMessages = [
        'qr_produk' => [
            'required' => 'Mohon mengisi kolom Barcode',
            'regex_match' => 'Barcode invalid'
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
