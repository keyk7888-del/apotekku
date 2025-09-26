<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeliController extends Controller
{
    public function index()
    {
        $keranjang = session()->get('keranjang', []);

        $subtotal = 0;
        foreach ($keranjang as $item) {
            $subtotal += $item['harga'] * $item['jumlah'];
        }

        $ongkir = 0; // contoh: gratis ongkir
        $total = $subtotal + $ongkir;

        return view('frontend.beli.index', compact('keranjang', 'subtotal', 'ongkir', 'total'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'metode_pembayaran' => 'required',
        ]);

        // Simpan pesanan (opsional: ke database)

        // Kosongkan keranjang
        session()->forget('keranjang');

        return redirect()->route('beli.index')->with('success', 'Pesanan berhasil dibuat!');
    }
}
