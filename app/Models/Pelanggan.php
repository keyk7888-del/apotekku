<?php

namespace App\Models;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
      use HasFactory;
    protected $table = 'pelanggan';

    protected $fillable = [
        'nama',
        'no_telp',
        'email',
        'keperluan',

    ];

      public function Pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }


}
