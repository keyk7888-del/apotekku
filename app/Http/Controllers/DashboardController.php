<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Obat;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // ✅ Hitung total data
        $totalAdmin     = User::count();
        $totalObat      = Obat::count();
        $totalCategory  = Category::count();
        $totalSupplier  = Supplier::count();
        $totalPelanggan = Pelanggan::count();

        // ✅ Ambil data grafik produk terjual (pakai kolom 'produk' dari tabel pesanan)
        $produkTerjual = Pesanan::select('produk', DB::raw('SUM(jumlah) as total_terjual'))
            ->groupBy('produk')
            ->get();

        // ✅ Ambil nama produk dan jumlah terjual untuk Chart.js
        $labels = $produkTerjual->pluck('produk');
        $data   = $produkTerjual->pluck('total_terjual');

        // ✅ Kirim data ke view dashboard
        return view('dashboard', [
            'totalAdmin'     => $totalAdmin,
            'totalObat'      => $totalObat,
            'totalCategory'  => $totalCategory,
            'totalSupplier'  => $totalSupplier,
            'totalPelanggan' => $totalPelanggan,
            'labels'         => $labels,
            'data'           => $data,
        ]);
    }
}
