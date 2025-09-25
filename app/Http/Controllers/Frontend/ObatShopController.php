<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Obat;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ObatShopController extends Controller
{
   
    public function index(Request $request)
{
    $search = $request->input('search');
    $category = $request->input('category_id'); // ambil dari select box

    $obatshop = Obat::when($search, function($query, $search) {
                        return $query->where('nama_obat', 'like', "%$search%");
                    })->when($category, function($query, $category) {
                        return $query->where('category_id', $category);
                    })->get();

    $categories = Category::all();

    return view('frontend.obatshop.index', compact('obatshop', 'categories'));
}


    public function show($id)
    {
        $obat = Obat::with('category')->findOrFail($id);
        return view('frontend.obatshop.show', compact('obat'));
    }


}
