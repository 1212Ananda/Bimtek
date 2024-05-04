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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('pendaftaran_id')->references('id')->on('pendaftaran');
            $table->decimal('jumlah_pembayaran');
            $table->string('bukti_pembayaran')->nullable();
            $table->string('status')->default('Belum Dibayar');
            $table->string('kode_billing')->nullable();
            $table->date('tanggal_pembayaran')->nullable();
            $table->date('tanggal_konfirmasi')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemabayaran');
    }
};
