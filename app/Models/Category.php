<?php

namespace App\Models;

use App\Models\Obat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'images',
    ];

    public function obat()
    {
        return $this->hasMany(Obat::class, 'category_id');
    }
}
