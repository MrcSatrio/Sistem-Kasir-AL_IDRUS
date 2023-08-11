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
        // Pemanggilan post dari VIEWS
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        // Pemanggilan data dari MODEL
        $user = $this->pegawaiModel->where('id_pegawai', $username)->first();
        // End Pemanggilan data dari MODEL
        if ($user && password_verify($password, $user['password'])) {

                //Session untuk login
                $session = session();
                $sessionData = [
                    'id_pegawai' => $user['id_pegawai'],
                    'username' => $user['username'],
                    'id_role' => $user['id_role'],
                    'nama' => $user['nama_pegawai'],

                ];
                $session->set($sessionData);
                //End  Session untuk Login
            // Memeriksa role pengguna
            if ($user['id_role'] == 1) {
                return redirect()->to('/koperasi/dashboard');
            } elseif ($user['id_role'] == 2) {
                return redirect()->to('/kasir/dashboard');
            } else {
                // Role tidak dikenali, Anda dapat menambahkan logika lain sesuai kebutuhan
                // Misalnya, mengarahkan ke halaman default atau menampilkan pesan kesalahan.
                return redirect()->to('/');
            }
            // End Memeriksa role Pengguna
        } else {
            $data['error'] = 'Username atau Password Salah';
            return view('/', $data);
        }
    }
    
    public function logout()
    {
        $session = session();
        $session->destroy();
        session_write_close();
        return redirect()->to('/');
    }
}
