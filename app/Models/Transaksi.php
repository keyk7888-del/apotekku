<?php

namespace App\Models;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';

    protected $fillable = [
        'pelanggan_id',
        'nomor_transaksi',
        'tanggal_transaksi',
        'obat_id',
        'harga',
        'jumlah_obat',
        'subtotal',
        'metode_pembayaran',
    ];

    public function daftarpelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }
    
    public function obat()
    {
    return $this->belongsTo(Obat::class, 'obat_id');
    }
}
