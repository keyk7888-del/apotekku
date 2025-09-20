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
        dd('test');
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelanggan_id')->nullable();
            $table->string('nomor_transaksi', 50)->nullable();
            $table->date('tanggal_transaksi')->nullable();
            $table->unsignedBigInteger('obat_id')->nullable();
            $table->double('harga', 16, 2)->default(0);
            $table->integer('jumlah_obat');
            $table->double('subtotal', 16, 2)->default(0);;
            $table->enum('metode_pembayaran', ['Cash', 'Transfer']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
