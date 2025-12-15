<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PendaftaranKKN extends Model
{
     use HasFactory;

    protected $table = 'pendaftaran_kkns';

    protected $fillable = [
        'user_id',
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
