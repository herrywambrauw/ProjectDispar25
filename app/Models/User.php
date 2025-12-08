<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use function PHPUnit\Framework\returnSelf;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',

        // Tambahkan kolom baru sesuai database Anda:
        'role',
        'username',
        'nama_lengkap',
        'no_hp',
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'tanggal_lahir' => 'date',
        ];
    }

    /**
     * Helper role
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isPendaftar()
    {
        return $this->role === 'pendaftaran';
    }

    public function isPenelitian()
    {
        return $this->role === 'penelitan';
    }

    public function isKkn()
    {
        return $this->role === 'kkn';
    }

    public function isMagang()
    {
        return $this->role === 'magang';
    }

    public function isPkl()
    {
        return $this -> role === 'pkl';
    }

    public function isPembimbing()
    {
        return $this->role === 'pembimbing';
    }

    public function isSekretariat()
    {
        return $this->role === 'sekretariat';
    }

    public function isPemasaran()
    {
        return $this->role === 'pemasaran';
    }
}
