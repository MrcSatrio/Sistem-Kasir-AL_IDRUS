<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table      = 'pegawai';
    protected $primaryKey = 'id_pegawai';

    protected $allowedFields = [
        'id_pegawai',
        'id_role',
        'username',
        'password',
        'nama_pegawai',
        'telp_pegawai',
        'alamat_pegawai',
    ];

    protected $validationRules = [
        'username'        => 'required|regex_match[/^[a-z0-9_.-]+$/]|min_length[5]|max_length[32]|is_unique[pegawai.username]',
        'password'        => 'required|regex_match[/^[A-Za-z0-9\s\S]+$/]|differs[username]|min_length[8]|max_length[32]',
        'password_confirm' => 'matches[password]|required_with[password]',
        'nama_pegawai'    => 'required|alpha_space|max_length[32]|is_unique[pegawai.nama_pegawai]',
        'telp_pegawai'    => 'max_length[13]|numeric',
        'alamat_pegawai'  => 'max_length[128]|alpha_numeric_punct'
    ];
    protected $validationMessages = [
        'username' => [
            'required'      => 'Mohon mengisi kolom username',
            'regex_match'   => 'Username tidak memenuhi aturan',
            'min_length'    => 'Karakter tidak boleh kurang dari 5 karakter',
            'max_length'    => 'Karakter tidak boleh lebih dari 32 karakter',
            'is_unique'     => 'Maaf, pegawai sudah terdaftar',
        ],
        'password' => [
            'required'      => 'Password tidak boleh kosong',
            'regex_match'   => 'Password tidak memenuhi aturan',
            'differs'       => 'Password tidak boleh sama dengan username',
            'min_length'    => 'Karakter tidak boleh kurang dari 8 karakter',
            'max_length'    => 'Karakter tidak boleh lebih dari 32 karakter'
        ],
        'password_confirm' => [
            'matches'       => 'Konfirmasi password berbeda'
        ],
        'nama_pegawai' => [
            'required'      => 'Mohon mengisi kolom Nama pegawai',
            'alpha_space'   => 'Kolom harus berupa huruf',
            'max_length'    => 'Karakter tidak boleh lebih dari 32 huruf',
            'is_unique'     => 'Maaf, pegawai sudah terdaftar',
        ],
        'telp_pegawai' => [
            'numeric'       => 'Kolom harus berupa angka',
            'max_length'    => 'Karakter tidak boleh lebih dari 13 angka'
        ],
        'alamat_pegawai' => [
            'alpha_numeric_punct' => 'Kolom harus berupa huruf, angka, dan simbol',
            'max_length'    => 'Karakter tidak boleh lebih dari 32 huruf'
        ],
    ];
}
