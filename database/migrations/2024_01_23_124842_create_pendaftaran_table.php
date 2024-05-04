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
            $table->foreignId('pelatihan_id')->nullable()->constrained('pelatihans')->onDelete('cascade');
            $table->string('jabatan');
            $table->string('no_tlp');
            $table->string('nama_perusahaan');
            $table->string('alamat_perusahaan');
            $table->string('no_perusahaan');
            $table->string('judul_bimtek');
            $table->text('deskripsi_bimtek');
            $table->string('spk')->nullable();
            $table->decimal('biaya')->nullable();
            $table->string('status')->default('menunggu persetujuan admin');
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
