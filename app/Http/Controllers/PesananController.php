<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PesananController extends Controller
{
    // 🧾 Menampilkan semua pesanan
    public function index()
    {
        // Ambil semua pesanan terbaru
        $pesanan = Pesanan::with('obat', 'pelanggan') // jika ada relasi
            ->latest()
            ->get();

        return view('pesanan.index', compact('pesanan'));
    }

    // 📋 Menampilkan detail satu pesanan
    public function show($id)
    {
        $pesanan = Pesanan::with('obat', 'pelanggan')->findOrFail($id);

        // Format tanggal ke WIB (Asia/Jakarta)
        $tanggal_transaksi = Carbon::parse($pesanan->created_at)
            ->timezone('Asia/Jakarta')
            ->translatedFormat('d-m-Y H:i');

        return view('pesanan.show', compact('pesanan', 'tanggal_transaksi'));
    }

    // 🗑️ Hapus pesanan
    public function destroy(string $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->delete();

        return redirect()->back()->with('success', 'Pesanan berhasil dihapus!');
    }
}
