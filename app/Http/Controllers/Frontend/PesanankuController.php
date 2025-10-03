<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;

class PesanankuController extends Controller
{
    public function index()
    {
        // Ambil nama pelanggan dari session
        $namaLengkap = session('nama_lengkap');

        // Kalau belum ada nama di session, arahkan ke checkout
        if (!$namaLengkap) {
            return redirect()->route('beli.index')->with('error', 'Silakan lakukan pembelian dulu untuk melihat riwayat pesanan.');
        }

        // Ambil semua pesanan berdasarkan nama pelanggan
        $pesanan = Pesanan::where('nama_lengkap', $namaLengkap)->orderBy('tanggal_transaksi', 'desc')->get();

        return view('frontend.pesananku.index', compact('pesanan', 'namaLengkap'));
    }

    public function show($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        return view('frontend.pesananku.show', compact('pesanan'));
    }
}
