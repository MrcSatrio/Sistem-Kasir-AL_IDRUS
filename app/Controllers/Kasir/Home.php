<?php

namespace App\Controllers\Kasir;

use \App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        return view('kasir/dashboard');
    }
}
