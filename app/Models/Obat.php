<?php

namespace App\Models;
use App\Models\Obat;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    protected $table = 'obat';

    protected $fillable = [
        'nama_obat',
        'category_id',
        'supplier_id',
        'jenis',
        'deskripsi',
        'harga',
        'stok_obat',
        'expired_date',
        'images',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    
    public function supplier()
    {
    return $this->belongsTo(Supplier::class, 'supplier_id');
    }

}
