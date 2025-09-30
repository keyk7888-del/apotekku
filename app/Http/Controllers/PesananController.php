<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::latest()->get();
        return view('pesanan.index', compact('pesanan'));
    }

    public function show($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        return view('pesanan.show', compact('pesanan'));
    }

    public function destroy(string $id)
    {
        Pesanan::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Pesanan berhasil dihapus!');
    }

}
