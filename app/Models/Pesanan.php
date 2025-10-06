<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';

    protected $fillable = [
        'nomor_transaksi',
        'tanggal_transaksi',
        'nama_lengkap',
        'nomor_telepon',
        'alamat_lengkap',
        'produk',
        'harga',
        'jumlah',
        'subtotal',
        'metode_pembayaran',
    ];

    // 🔹 Tambahkan relasi pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'obat_id');
    }

}
