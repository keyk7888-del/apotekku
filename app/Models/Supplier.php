<?php

namespace App\Models;

use App\Models\Obat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'no_telp',
        'email',
        'kontak_person',
        'keterangan',
    ];

    // relasi jika supplier punya banyak obat
    public function obat()
    {
        return $this->hasMany(Obat::class, 'supplier_id');
    }
}
