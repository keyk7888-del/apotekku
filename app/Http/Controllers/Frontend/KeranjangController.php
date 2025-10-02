<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Obat;

class KeranjangController extends Controller
{
    public function index()
    {
        // Ambil keranjang dari session
        $keranjang = session()->get('keranjang', []);

        $subtotal = 0;
        foreach ($keranjang as $item) {
            $subtotal += $item['harga'] * $item['jumlah'];
        }

        // total = subtotal (tanpa pajak)
        $total = $subtotal;

        return view('frontend.keranjang.index', compact('keranjang', 'subtotal', 'total'));
    }


    public function tambah(Request $request, $id)
    {
        $obat = Obat::findOrFail($id);

        // Ambil jumlah dari input form
        $jumlah = $request->input('jumlah', 1);

        $keranjang = session()->get('keranjang', []);

        if (isset($keranjang[$id])) {
            // kalau obat sudah ada, tambahkan sesuai jumlah
            $keranjang[$id]['jumlah'] += $jumlah;
        } else {
            // kalau belum ada, simpan dengan jumlah yang dipilih
            $keranjang[$id] = [
                "nama_obat" => $obat->nama_obat,
                "harga"     => $obat->harga,
                "jumlah"    => $jumlah,
                "foto"      => $obat->foto
            ];
        }

        session()->put('keranjang', $keranjang);

        return redirect()->route('keranjang.index')->with('success', 'Obat berhasil ditambahkan ke keranjang!');
    }


    public function hapus($id)
    {
        $keranjang = session()->get('keranjang', []);

        if (isset($keranjang[$id])) {
            unset($keranjang[$id]);
            session()->put('keranjang', $keranjang);
        }

        return redirect()->route('keranjang.index')->with('success', 'Obat berhasil dihapus dari keranjang!');
    }
}