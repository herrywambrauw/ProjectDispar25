<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {


            $table->enum('role', ['admin', 'pendaftar', 'penelitian','kkn','magang', 'pkl','pembimbing','sekretariat','pemasaran'])
                  ->default('pendaftar')
                  ->after('password');


            $table->string('username')->nullable()->after('email');
            $table->string('nama_lengkap')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('nik')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn([
                'role',
                'username',
                'nama_lengkap',
                'no_hp',
                'nik',
                'jenis_kelamin',
                'tempat_lahir',
                'tanggal_lahir',
                'alamat',
            ]);
        });
    }
};
