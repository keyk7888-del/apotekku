<?php

namespace App\Http\Controllers;

use App\Models\User;       // untuk admin
use App\Models\Obat;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalAdmin'     => User::count(),       // total admin
            'totalObat'      => Obat::count(),       // total obat
            'totalCategory'  => Category::count(),   // total category
            'totalSupplier'  => Supplier::count(),   // total supplier
            'totalPelanggan' => Pelanggan::count(),  // total pelanggan
            // contoh data grafik
            'bulan' => ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
            'jumlah' => [5,3,8,2,6,4,7,1,9,10,0,0], // bisa diganti query real
        ]);
    }
}
