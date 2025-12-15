<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranPKL extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_pkls';

    protected $fillable = [
        'user_id',
        'nim',
        'instansi',
        'prodi',
        'pembimbing',
        'nohp_pembimbing',
        'tanggal_mulai',
        'surat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
