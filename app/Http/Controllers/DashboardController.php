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
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // 🔹 Hitung total data utama
        $totalAdmin     = User::count();
        $totalObat      = Obat::count();
        $totalCategory  = Category::count();
        $totalSupplier  = Supplier::count();
        $totalPelanggan = Pelanggan::count();

        // 🔹 Ambil data grafik produk terjual
        $produkTerjual = Pesanan::select('produk', DB::raw('SUM(jumlah) as total_terjual'))
            ->groupBy('produk')
            ->get();

        $labels = $produkTerjual->pluck('produk');
        $data   = $produkTerjual->pluck('total_terjual');

        // 🔹 Hitung total obat terjual (semua pesanan)
        $totalTerjual = Pesanan::sum('jumlah');

        // 🔹 Hitung stok obat yang tersedia
        $totalStok = Obat::sum('stok_obat');

        // 🔹 Persentase obat terjual (agar realistis)
        $persenTerjual = $totalStok > 0
            ? round(($totalTerjual / ($totalStok + $totalTerjual)) * 100, 2)
            : 0;

        // 🔹 Jam operasional (contoh simulasi)
        $jamOperasional = 34; // atau buat otomatis sesuai log aktivitas

        // 🔹 Aktivitas apotek: total jam kerja minggu ini (simulasi)
        $aktivitasJam   = 231;
        $aktivitasMenit = 14;
        $kenaikanAktivitas = 18.4; // %

        // ✅ Kirim semua data ke view dashboard
        return view('dashboard', compact(
            'totalAdmin',
            'totalObat',
            'totalCategory',
            'totalSupplier',
            'totalPelanggan',
            'labels',
            'data',
            'jamOperasional',
            'persenTerjual',
            'aktivitasJam',
            'aktivitasMenit',
            'kenaikanAktivitas'
        ));
    }
}
