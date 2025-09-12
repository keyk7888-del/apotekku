<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::with('category')->orderBy('created_at', 'desc')->get();
        return view('obat.index', compact('obat'));
    }

    public function create()
    {
        $categories = Category::select('id', 'nama')->orderBy('nama')->get();
        return view('obat.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3|max:64',
            'deskripsi' => 'required',
            'harga' => 'required',
            'images' => 'required|image',
            'category_id' => 'required',
            'stok_obat' => 'required',
        ]);

        $images = $request->file('images');
        $directory = 'images/';
        $filename = Str::random(10) . '.' . $images->getClientOriginalExtension();
        Storage::putFileAs($directory, $images, $filename);

        Obat::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'images' => $filename,
            'category_id' => $request->category_id,
            'stok_obat' => $request->stok_obat,
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
        $obat = Obat::findOrFail($id);
        $categories = Category::orderBy('nama', 'asc')->get();
        return view('obat.edit', compact('obat', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|min:3|max:64',
            'deskripsi' => 'required',
            'harga' => 'required',
            'images' => 'nullable|image',
            'category_id' => 'required',
            'stok_obat' => 'required',
        ]);

        $obat = Obat::findOrFail($id);

        $data = $request->only(['nama','deskripsi','harga','category_id','stok_obat']);

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
