<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Actions\Fortify\CreateNewUser;

class RegisteredUserController extends Controller
{
    // STEP 1 — SIMPAN AKUN LOGIN KE SESSION
    public function storeStep1(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        Session::put('register_step1', $validated);

        return redirect()->route('register.step2');
    }

    // STEP 2 — SIMPAN DATA DIRI & BUAT USER
    public function storeStep2(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'max:20'],
            'jenis_kelamin' => ['required', 'string'],
            'tempat_lahir' => ['required', 'string'],
            'tanggal_lahir' => ['required', 'date'],
            'no_hp' => ['required', 'string', 'max:20'],
            'alamat' => ['required', 'string'],
        ]);

        // Ambil data step 1 dari session
        $step1 = Session::get('register_step1');

        // Gabungkan step1 + step2
        $data = array_merge($step1, $validated);

        // Buat user baru
        $user = app(CreateNewUser::class)->create($data);

        // Bersihkan session
        Session::forget('register_step1');

        return redirect()->route('dashboard');
    }
}
