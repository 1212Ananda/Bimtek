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
        Schema::create('jadwal_pelatihan', function (Blueprint $table) {
            $table->id();
            $table->string('hari');
            $table->date('tanggal');
            $table->string('tempat');
            $table->string('nama_pelatih');
            $table->unsignedBigInteger('pendaftaran_id'); 

            $table->foreign('pendaftaran_id')
                ->references('id')
                ->on('pendaftaran')
                ->onDelete('cascade');
               
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_pelatihan');
    }
};
