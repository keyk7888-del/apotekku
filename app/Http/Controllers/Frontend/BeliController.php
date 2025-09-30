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

        $subtotal = 0;
        foreach ($keranjang as $item) {
            $subtotal += $item['harga'] * $item['jumlah'];
        }

        $ongkir = 0;
        $total = $subtotal + $ongkir;

        // Generate nomor transaksi unik
        $nomor_transaksi = 'TRX-' . strtoupper(uniqid());

        // Tanggal transaksi
        $tanggal_transaksi = now()->format('d-m-Y H:i');

        // Kirim data ke halaman konfirmasi
        return redirect()->route('beli.konfirmasi')->with([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'metode_pembayaran' => $request->metode_pembayaran,
            'keranjang' => $keranjang,
            'subtotal' => $subtotal,
            'total' => $total,
            'nomor_transaksi' => $nomor_transaksi,
            'tanggal_transaksi' => $tanggal_transaksi,
        ]);
    }

    public function konfirmasi()
    {
        // Ambil data dari session flash
        $nama = session('nama');
        $alamat = session('alamat');
        $telepon = session('telepon');
        $metode_pembayaran = session('metode_pembayaran');
        $keranjang = session('keranjang', []);
        $subtotal = session('subtotal', 0);
        $total = session('total', 0);
        $nomor_transaksi = session('nomor_transaksi');
        $tanggal_transaksi = session('tanggal_transaksi');

        // Setelah data tampil di view, keranjang bisa dikosongkan
        session()->forget('keranjang');

        return view('frontend.beli.konfirmasi', compact(
            'nama',
            'alamat',
            'telepon',
            'metode_pembayaran',
            'keranjang',
            'subtotal',
            'total',
            'nomor_transaksi',
            'tanggal_transaksi'
        ));
    }
}
