<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;


class ObatShopController extends Controller
{
    public function index()
    {
        $obatshop = Obat::all();
        return view('obatshop.index', compact('obatshop'));
    }
}
