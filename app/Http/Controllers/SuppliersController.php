<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all(); 
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3|max:64',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'kontak_person' => 'required',
            'keterangan' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi',
            'nama.min' => 'Nama minimal 3 karakter',
            'nama.max' => 'Nama maksimal 64 karakter',
            'alamat.required' => 'Alamat harus diisi',
            'no_telp.required' => 'No. Telp harus diisi',
            'email.required' => 'Email harus diisi',
            'kontak_person.required' => 'Kontak person harus diisi',
            'keterangan.required' => 'Keterangan harus diisi',
        ]);
        
        Supplier::create($request->only(['nama', 'alamat', 'no_telp', 'email', 'kontak_person', 'keterangan']));
        return redirect()->route('suppliers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = Supplier::find($id);
        return view('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $suppliers = Supplier::find($id);
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|min:3|max:64',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'kontak_person' => 'required',
            'keterangan' => 'required',
        ]);

        $suppliers = Supplier::find($id);
        $supplier->update($request->only(['nama', 'alamat', 'no_telp', 'email', 'kontak_person', 'keterangan']));
        return redirect()->route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Supplier::find($id)->delete(); 
        return redirect()->back();
    }
}
