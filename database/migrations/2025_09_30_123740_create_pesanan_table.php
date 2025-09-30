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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_transaksi');
            $table->dateTime('tanggal_transaksi');
            $table->string('nama_lengkap');
            $table->string('nomor_telepon');
            $table->text('alamat_lengkap');
            $table->string('produk');
            $table->integer('harga');
            $table->integer('jumlah');
            $table->integer('subtotal');
            $table->string('metode_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
