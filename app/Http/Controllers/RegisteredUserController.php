<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Actions\Fortify\CreateNewUser;

class RegisteredUserController extends Controller
{
    public function storeStep1(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        Session::put('register_step1', [
            'email' => $validated['email'],
            'username' => $validated['username'],
            'password' => $validated['password'],
            'password_confirmation' => $request->password_confirmation,
        ]);

        return redirect()->route('register.step2');
    }

    public function storeStep2(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'max:20'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'no_hp' => ['required', 'string', 'max:20'],
            'alamat' => ['required', 'string'],
        ]);

        $step1 = Session::get('register_step1');

        if (!$step1) {
            return redirect()->route('register.step1');
        }

        $data = array_merge($step1, $validated);
        $data['name'] = $validated['nama_lengkap'];


        Session::put('register_preview', $data);

        return back()->with('preview_data', $data);
    }

    public function confirmRegister()
    {
        $data = Session::get('register_preview');

        if (!$data) {
            return redirect()->route('register.step1');
        }

        $user = app(CreateNewUser::class)->create($data);

        Session::forget(['register_step1', 'register_preview']);

        return redirect()->route('login')
            ->with('success', 'Pendaftaran berhasil, silakan login');
    }
}
