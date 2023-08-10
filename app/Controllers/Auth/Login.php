<?php

namespace App\Controllers\Auth;

use \App\Controllers\BaseController;

class Login extends BaseController
{
    protected $pegawaiModel;
    public function index()
    {
        return view('auth/login');
    }

    public function login()
    {
        
        // pemanggilan post dari VIEWS
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        // pemanggilan data dari MODEL
        $user = $this->pegawaiModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            return redirect()->to('/koperasi/dashboard');
        } else {
            $data['error'] = 'Username atau Password Salah';
            return view('/', $data);
        }
    }
}
