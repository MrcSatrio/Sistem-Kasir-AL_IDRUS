<?php

namespace App\Controllers\KepalaKoperasi\Siswa;

use \App\Controllers\BaseController;

class Create extends BaseController
{
    protected $pegawaiModel;

    public function index()
    {
        $data =
            [
                'title'     => 'form -> member',
            // You can add other fields here based on your table structure
          
        ];
        return view('kepalakoperasi/siswa/create', $data);
    }

    public function insert()
{
    $validationRules = $this->pegawaiModel->validationRules;

    if (!$this->validate($validationRules)) {
        session()->setFlashdata('break_the_rules', $this->validator->listErrors());
        return redirect()->back()->withInput();
    }

    $rawPassword = $this->request->getVar('password');
    $confirmPassword = $this->request->getVar('password_confirm');

    if ($confirmPassword !== $rawPassword) { // Menggunakan operator !== untuk perbandingan yang ketat
        session()->setFlashdata('error_lm', 'Password konfirmasi tidak sesuai');
        return redirect()->back()->withInput();
    } else {
        $hashedPassword = password_hash($rawPassword, PASSWORD_DEFAULT);

        $pegawaiData = [
            'id_role' => $this->request->getVar('id_role'),
            'username' => $this->request->getVar('username'),
            'password' => $hashedPassword,
            'nama_pegawai' => $this->request->getVar('nama_pegawai'),
            'telp_pegawai' => $this->request->getVar('telp_pegawai'),
            'alamat_pegawai' => $this->request->getVar('alamat_pegawai'),
            'instansi_pegawai' => $this->request->getVar('instansi_pegawai'),
        ];
    
        $this->pegawaiModel->save($pegawaiData);
    
        session()->setFlashdata('success', 'Data pegawai berhasil ditambahkan.');
        return redirect()->back()->withInput();
    }
}

}
