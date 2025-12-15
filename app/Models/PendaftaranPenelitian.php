<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranPenelitian extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_penelitian';

    protected $fillable = [
        'user_id',
        'keterangan',
        'judul_penelitian',
        'instansi',
        'prodi',
        'fakultas',
        'pembimbing',
        'nohp_pembimbing',
        'tanggal_mulai',
        'lokasi_tujuan',
        'surat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
