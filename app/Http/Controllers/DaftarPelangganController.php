<?php

namespace App\Http\Controllers;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class DaftarPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $daftarpelanggan = Pelanggan::orderBy('nama', 'asc')->get(); 
        return view('pages.daftarpelanggan.index', compact('daftarpelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $daftarpelanggan = Pelanggan::findOrFail($id);
        return view('pages.daftarpelanggan.show', compact('daftarpelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pelanggan::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Daftar Pelanggan berhasil dihapus!');
    }
}
