<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\Obat;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::with(['daftarpelanggan','obat'])->orderBy('created_at', 'ASC')->get();
        return view('transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $daftarpelanggan = Pelanggan::orderBy('nama')->get();
        $obat = Obat::orderBy('nama_obat')->get();
        return view('transaksi.create', compact('daftarpelanggan', 'obat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'pelanggan_id' => 'required|exists:pelanggan,id',
        'nomor_transaksi' => 'required|string|max:50',
        'tanggal_transaksi' => 'required|date',
        'obat_id' => 'required|exists:obat,id',
        'harga' => 'required|numeric|min:0',
        'jumlah_obat' => 'required|integer|min:1',
        'metode_pembayaran' => 'required|in:Cash,Transfer',
    ]);

    // Hitung subtotal
    $subtotal = $request->harga * $request->jumlah_obat;

    // Simpan ke DB
    Transaksi::create([
        'pelanggan_id' => $request->pelanggan_id,
        'nomor_transaksi' => $request->nomor_transaksi,
        'tanggal_transaksi' => $request->tanggal_transaksi,
        'obat_id' => $request->obat_id,
        'harga' => $request->harga,
        'jumlah_obat' => $request->jumlah_obat,
        'subtotal' => $subtotal,
        'metode_pembayaran' => $request->metode_pembayaran,
    ]);

    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Transaksi::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Transaksi berhasil dihapus!');
    }
}
