<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
     public function index()
    {
        return view('pages.pelanggan.index');
    }

     public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'telp'=>'required',
            'email'=>'required',
            'keperluan'=>'required',
        ]);

        
        return redirect()->route('pelanggan.index')->with('succes', 'Data berhasil disimpan');
    }
}
