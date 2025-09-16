<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('obat', function (Blueprint $table) {
            $table->id();
             $table->string('nama_obat', 225); // Nama Produk (Obat)
            $table->unsignedBigInteger('category_id')->nullable(); 
            $table->unsignedBiginteger('supplier_id')->nullable();
            $table->string('jenis'); // Jenis Obat (Tablet,Kapsul, dll)
            $table->longText('deskripsi')->nullable(); // Deskripsi Singkat Obat
            $table->double('harga', 16, 2)->default(0); // Harga Obat
            $table->smallInteger('stok_obat')->unsigned()->default(0); //Stok Obat yang tersedia
            $table->date('expired_date')->nullable(); // Exp Obat
            $table->string('images')->nullable(); // Gambar Utama Obat
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat');
    }
};
