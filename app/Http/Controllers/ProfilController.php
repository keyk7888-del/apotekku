<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.profil.index', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'email'=>'required|email|unique:user,email,' .Auth::user()->id,
            'password'=>'confirned|min:8|nullable'
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password){
         $user->password = bcrypt($request->password);
        }

        $user->save();
        
        return redirect()->route('ubah-profil')->with('success', 'Profil Berhasil Diubah');
    }
}