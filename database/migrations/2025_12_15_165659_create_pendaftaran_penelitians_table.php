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
        Schema::create('pendaftaran_penelitians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('judul_penelitian');
            $table->string('keterangan')->nullable();
            $table->string('instansi');
            $table->string('prodi');
            $table->string('fakultas');
            $table->string('pembimbing')->nullable();
            $table->string('nohp_pembimbing')->nullable();
            $table->date('tanggal_mulai');
            $table->string('lokasi_tujuan');
            $table->string('surat');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_penelitians');
    }
};
