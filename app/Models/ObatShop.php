<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatShop extends Model
{
    use HasFactory;

    // pakai tabel 'obats' meskipun nama model 'ObatShop'

    // field yang boleh diisi
    protected $fillable = [
        'nama',
        'harga',
        'foto',
        'deskripsi',
    ];
}
