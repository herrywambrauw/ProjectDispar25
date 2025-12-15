<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PendaftaranMagang extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_magangs';

    protected $fillable = [
        'user_id',
        'nim',
        'instansi',
        'prodi',
        'fakultas',
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
