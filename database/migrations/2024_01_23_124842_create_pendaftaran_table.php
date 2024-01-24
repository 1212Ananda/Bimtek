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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('pendidikan_terakhir');
            $table->string('no_tlp');
            $table->string('nama_perusahaan');
            $table->string('alamat_perusahaan');
            $table->string('no_perusahaan');
            $table->string('surat_permohonan');
            $table->string('bukti_pembayaran')->nullable();  
            $table->string('ttd_surat_keputusan')->nullable();
            $table->string('kode_billing')->nullable();
            $table->string('surat_keputusan')->nullable();
            $table->string('status')->default('pending');
            $table->boolean('konfirmasi_pembayaran')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
