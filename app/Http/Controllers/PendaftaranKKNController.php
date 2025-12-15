<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PendaftaranKKN;

class PendaftaranKKNController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       if (!Auth::check()) {
            return redirect()->route('register')
                ->with('warning', 'Silakan daftar akun terlebih dahulu');
        }

        return view('landingpage.form.form-kkn', [
            'user' => Auth::user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      if (!Auth::check()) {
            return redirect()->route('login');
        }

        $request->validate([
            'instansi'         => 'required|string|max:255',
            'prodi'            => 'required|string|max:255',
            'fakultas'         => 'required|string|max:255',
            'pembimbing'       => 'nullable|string|max:255',
            'nohp_pembimbing'  => 'nullable|string|max:20',
            'tanggal_mulai'    => 'required|date',
            'lokasi_tujuan'    => 'required|string|max:255',
            'surat'            => 'required|mimes:pdf|max:2048',
        ]);

        $path = $request->file('surat')->store('surat_kkn', 'public');

        PendaftaranKKN::create([
            'user_id'          => Auth::id(),
            'instansi'         => $request->instansi,
            'prodi'            => $request->prodi,
            'fakultas'         => $request->fakultas,
            'pembimbing'       => $request->pembimbing,
            'nohp_pembimbing'  => $request->nohp_pembimbing,
            'tanggal_mulai'    => $request->tanggal_mulai,
            'lokasi_tujuan'    => $request->lokasi_tujuan,
            'surat'            => $path,
        ]);

        return redirect()->route('dashboard')
        ->with('success', 'Pendaftaran KKN berhasil dikirim.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
