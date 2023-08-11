<?php

namespace App\Controllers\KepalaKoperasi;

use \App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data =
            [
                'title' => 'Koperasi - Dashboard',
            ];
        return view('kepalakoperasi/dashboard', $data);
    }
}
