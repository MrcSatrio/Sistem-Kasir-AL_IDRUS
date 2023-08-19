<?php

namespace App\Controllers\KepalaKoperasi;

use App\Controllers\BaseController;
use App\Models\TransaksiModel; // Menambahkan impor model

class Dashboard extends BaseController
{
    protected $transaksiModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
    }

    public function index()
    {
        $thisWeekMonday = date('Y-m-d', strtotime('this week'));
        $thisWeekSunday = date('Y-m-d', strtotime('this week +6 days'));

        $totalTransaksiHariIni = $this->transaksiModel
            ->where('DATE(created_at)', date('Y-m-d'))
            ->selectSum('total_transaksi')
            ->get()
            ->getRow()
            ->total_transaksi;
        $totalTransaksiBulanIni = $this->transaksiModel
            ->where('YEAR(created_at)', date('Y'))
            ->where('MONTH(created_at)', date('m'))
            ->selectSum('total_transaksi')
            ->get()
            ->getRow()
            ->total_transaksi;
        $totalTransaksiTahunIni = $this->transaksiModel
            ->where('YEAR(created_at)', date('Y'))
            ->selectSum('total_transaksi')
            ->get()
            ->getRow()
            ->total_transaksi;
        $totalTransaksiBulanan = $this->transaksiModel
            ->select('MONTH(created_at) as month, SUM(total_transaksi) as total_transaksi')
            ->where('created_at >=', date('Y-01-01'))
            ->where('created_at <=', date('Y-12-t'))
            ->groupBy('month')
            ->get()
            ->getResult();
        $totalTransaksiMingguIni = $this->transaksiModel
            ->where('created_at >=', $thisWeekMonday)
            ->where('created_at <=', $thisWeekSunday)
            ->selectSum('total_transaksi')
            ->get()
            ->getRow()
            ->total_transaksi;
    
        $data = [
            'title' => 'Koperasi - Dashboard',
            'transactiontoday' => $totalTransaksiHariIni,
            'transactionThisMonth' => $totalTransaksiBulanIni,
            'transactionThisYear' => $totalTransaksiTahunIni,
            'transactionMonthly' => $totalTransaksiBulanan,
            'transactionThisWeek' => $totalTransaksiMingguIni
            
        ];

        return view('kepalakoperasi/dashboard', $data);
    }
}
