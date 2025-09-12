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
            $table->string('nama', 225); // Nama Produk (Obat)
            $table->longText('deskripsi')->nullable(); // Deskripsi Singkat Obat
            $table->double('harga', 16, 2)->default(0); // Harga Obat
            $table->string('images')->nullable(); // Gambar Utama Obat
            $table->bigInteger('category_id')->unsigned(); 
            $table->smallInteger('stok_obat')->unsigned()->default(0); //Stok Obat yang tersedia
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
