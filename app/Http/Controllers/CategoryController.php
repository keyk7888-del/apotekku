<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('nama', 'asc')->get(); 
        return view('categories.index', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); // ambil semua data supplier
        return view('categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'images' => 'nullable|images',
        ]);
        $images = $request->file('images');
        $directory = 'images/';
        $filename = Str::random(10) . '.' . $images->getClientOriginalExtension();
        Storage::putFileAs($directory, $images, $filename);

        Category::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'images' => $filename,   
        ]);

        //Category::create($request->all());
        return redirect()->route('categories.index')->with('success', 'category berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::find($id);
        return view('categories.show', compact('categories'));
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
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'images' => 'nullable|images',
        ]);
        $images = $request->file('images');
        $directory = 'images/';
        $filename = Str::random(10) . '.' . $images->getClientOriginalExtension();
        Storage::putFileAs($directory, $images, $filename);

        Category::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'images' => $filename,   
        ]);
        return redirect()->route('categories.index')->with('success', 'categories berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}