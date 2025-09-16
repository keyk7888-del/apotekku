<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ObatController extends Controller
{
    public function index()
    {
        //$obat = Obat::with('category')->orderBy('created_at', 'desc')->get();
        $obat = Obat::with(['category','supplier'])->orderBy('created_at', 'desc')->get();
        return view('obat.index', compact('obat'));
    }

    public function create()
    {
        $categories = Category::orderBy('nama')->get();
        $suppliers = Supplier::orderBy('nama')->get();
        return view('obat.create', compact('categories', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|min:3|max:64',
            'category_id' => 'nullable|exists:categories,id',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'jenis' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'stok_obat' => 'required',
            'expired_date' => 'required',
            'images' => 'nullable|image',
        ]);

        $images = $request->file('images');
        $directory = 'images/';
        $filename = Str::random(10) . '.' . $images->getClientOriginalExtension();
        Storage::putFileAs($directory, $images, $filename);

        Obat::create([
            'nama_obat' => $request->nama_obat,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok_obat' => $request->stok_obat,
            'expired_date' => $request->expired_date,
            'images' => $filename,   
        ]);

        return redirect()->route('obat.index')->with('success', 'Obat berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $obat = Obat::findOrFail($id);
        return view('obat.show', compact('obat'));
    }

    public function edit(string $id)
    {
        //$obat = Obat::findOrFail($id);
        //$categories = Category::orderBy('nama', 'asc')->get();
        //return view('obat.edit', compact('obat', 'categories'));
        $obat = Obat::findOrFail($id);
        $categories = Category::orderBy('nama', 'asc')->get();
        $suppliers  = Supplier::orderBy('nama', 'asc')->get();

        return view('obat.edit', compact('obat', 'categories', 'suppliers'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_obat' => 'required|min:3|max:64',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'stok_obat' => 'required',
            'expired_date' => 'required',
            'images' => 'nullable|image',
        ]);

        $obat = Obat::findOrFail($id);

        $data = $request->only(['nama_obat','category_id','supplier_id','jenis','deskripsi','harga','stok_obat','expired_date','images']);

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $directory = 'images/';
            $filename = Str::random(10) . '.' . $images->getClientOriginalExtension();
            Storage::putFileAs($directory, $images, $filename);
            $data['images'] = $filename;
        }

        $obat->update($data);

        return redirect()->route('obat.index')->with('success', 'Obat berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        Obat::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Obat berhasil dihapus!');
    }
}
