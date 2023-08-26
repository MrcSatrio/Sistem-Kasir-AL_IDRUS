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
        'instansi_pegawai',
    ];

    protected $validationRules = [
        'username'        => 'required|regex_match[/^[a-zA-Z0-9_.-]+$/]|min_length[5]|max_length[32]|is_unique[pegawai.username]',
        'password' => 'required|min_length[8]|max_length[255]',
        // 'password_confirm' => 'matches[password]|required_with[password]',      
        'nama_pegawai'    => 'required|alpha_space|max_length[32]',
        'telp_pegawai'    => 'max_length[13]|numeric',
        'alamat_pegawai'  => 'max_length[128]|alpha_numeric_punct',
        // 'instansi_pegawai'  => 'max_length[32]|alpha_numeric_punct'
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
        ],
        'telp_pegawai' => [
            'numeric'       => 'Kolom harus berupa angka',
            'max_length'    => 'Karakter tidak boleh lebih dari 13 angka'
        ],
        'alamat_pegawai' => [
            'alpha_numeric_punct' => 'Kolom harus berupa huruf, angka, dan simbol',
            'max_length'    => 'Karakter tidak boleh lebih dari 32 huruf'
        ],
        // 'instansi_pegawai' => [
        //     'alpha_numeric_space' => 'Kolom harus berupa huruf, angka, dan spasi',
        //     'max_length'    => 'Karakter tidak boleh lebih dari 32 huruf'
        // ],
    ];
}
