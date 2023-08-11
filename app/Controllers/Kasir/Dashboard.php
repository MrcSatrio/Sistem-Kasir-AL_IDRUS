<?php

namespace App\Controllers\Kasir;

use \App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data =
            [
                'title' => 'Koperasi - Dashboard',
            ];
        return view('kasir/dashboard', $data);
    }
}
