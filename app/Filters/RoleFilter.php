<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // session yang diambil dari fungsi LOGIN
        $session = session();
        if (!$session->get('username')) {
            return redirect()->to('/');
        } else {
            $role = $session->get('id_role');
            if ($role == 1 && strpos($request->uri->getPath(), 'koperasi') === false) {
                return redirect()->to('/koperasi/dashboard');
            } elseif ($role == 2 && strpos($request->uri->getPath(), 'kasir') === false) {
                return redirect()->to('/kasir/dashboard');
            } 
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}