<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    public function create(array $input)
    {
        Validator::make($input, [
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'password' => $this->passwordRules(),

            'nama_lengkap' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'max:20'],
            'jenis_kelamin' => ['required', 'string'],
            'tempat_lahir' => ['required', 'string'],
            'tanggal_lahir' => ['required', 'date'],
            'no_hp' => ['required', 'string', 'max:20'],
            'alamat' => ['required', 'string'],
        ])->validate();

        return User::create([
            'email' => $input['email'],
            'username' => $input['username'],
            'password' => Hash::make($input['password']),

            'nama_lengkap' => $input['nama_lengkap'],
            'nik' => $input['nik'],
            'jenis_kelamin' => $input['jenis_kelamin'],
            'tempat_lahir' => $input['tempat_lahir'],
            'tanggal_lahir' => $input['tanggal_lahir'],
            'no_hp' => $input['no_hp'],
            'alamat' => $input['alamat'],
        ]);
    }
}
