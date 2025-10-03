<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesananku extends Model
{
    // Nama tabel sesuai di database
    protected $table = 'pesanan';

    protected $fillable = [
        'nomor_transaksi',
        'tanggal_transaksi',
        'nama_lengkap',
        'alamat_lengkap',
        'produk',
        'harga',
        'jumlah',
        'subtotal',
        'metode_pembayaran',
    ];

    public $timestamps = false; // kalau tabel tidak ada kolom created_at & updated_at
}
