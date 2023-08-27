<?php

namespace App\Controllers\KepalaKoperasi\Pegawai;

use \App\Controllers\BaseController;

class Create extends BaseController
{
    protected $pegawaiModel;

    public function index()
    {
        $data =
            [
                'title'     => 'form -> pegawai',
            // You can add other fields here based on your table structure
          
        ];
        return view('kepalakoperasi/pegawai/create', $data);
    }

    public function insert()
{
    if (!$this->validate($this->pegawaiModel->validationRules)) {
        session()->setFlashdata('field_errors', $this->validator->listErrors());
        session()->setFlashdata('field_error.username', $this->validator->getError('username'));
        session()->setFlashdata('field_error.password', $this->validator->getError('password'));
        session()->setFlashdata('field_error.nama_pegawai', $this->validator->getError('nama_pegawai'));
        session()->setFlashdata('field_error.telp_pegawai', $this->validator->getError('telp_pegawai'));
        session()->setFlashdata('field_error.alamat_pegawai', $this->validator->getError('alamat_pegawai'));
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
        ];
    
        $this->pegawaiModel->save($pegawaiData);
    
        session()->setFlashdata('success', 'Data pegawai berhasil ditambahkan.');
        return redirect()->back()->withInput();
    }
}

}
