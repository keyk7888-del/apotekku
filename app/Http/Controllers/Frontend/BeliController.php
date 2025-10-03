<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BeliController extends Controller
{
    public function index()
    {
        $keranjang = session()->get('keranjang', []);

        $subtotal = 0;
        foreach ($keranjang as $item) {
            $subtotal += $item['harga'] * $item['jumlah'];
        }

        $ongkir = 0; // contoh gratis ongkir
        $total = $subtotal + $ongkir;

        return view('frontend.beli.index', compact('keranjang', 'subtotal', 'ongkir', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'metode_pembayaran' => 'required',
        ]);

        $keranjang = session()->get('keranjang', []);

        if (empty($keranjang)) {
            return redirect()->route('beli.index')->with('error', 'Keranjang kosong!');
        }

        $subtotal = 0;
        foreach ($keranjang as $item) {
            $subtotal += $item['harga'] * $item['jumlah'];
        }

        $ongkir = 0;
        $total = $subtotal + $ongkir;

        session(['nama_lengkap' => $request->nama]);

        // Generate nomor transaksi unik
        $nomor_transaksi = 'TRX-' . strtoupper(Str::random(10));

        // Simpan pesanan ke database
        foreach ($keranjang as $item) {
            Pesanan::create([
                'nomor_transaksi'   => $nomor_transaksi,
                'tanggal_transaksi' => Carbon::now(),
                'nama_lengkap'      => $request->nama,
                'nomor_telepon'     => $request->telepon,
                'alamat_lengkap'    => $request->alamat,
                'produk'            => $item['nama_obat'] ?? '-', // <-- aman walau tidak ada 'nama'
                'harga'             => $item['harga'],
                'jumlah'            => $item['jumlah'],
                'subtotal'          => $item['harga'] * $item['jumlah'],
                'metode_pembayaran' => $request->metode_pembayaran,
            ]);
        }

        // Hapus keranjang setelah pesanan disimpan
        session()->forget('keranjang');

        // Kirim data ke halaman konfirmasi
        return redirect()->route('beli.konfirmasi')->with([
            'nama'              => $request->nama,
            'alamat'            => $request->alamat,
            'telepon'           => $request->telepon,
            'metode_pembayaran' => $request->metode_pembayaran,
            'keranjang'         => $keranjang,
            'subtotal'          => $subtotal,
            'total'             => $total,
            'nomor_transaksi'   => $nomor_transaksi,
            'tanggal_transaksi' => Carbon::now()->format('d-m-Y H:i'),
        ]);
    }

    public function konfirmasi()
    {
        // Pastikan ada data di session
        if (!session()->has('nomor_transaksi')) {
            return redirect()->route('beli.index');
        }

        return view('frontend.beli.konfirmasi', [
            'nama'              => session('nama'),
            'alamat'            => session('alamat'),
            'telepon'           => session('telepon'),
            'metode_pembayaran' => session('metode_pembayaran'),
            'keranjang'         => session('keranjang', []),
            'subtotal'          => session('subtotal', 0),
            'total'             => session('total', 0),
            'nomor_transaksi'   => session('nomor_transaksi'),
            'tanggal_transaksi' => session('tanggal_transaksi'),
        ]);
    }
    
}
