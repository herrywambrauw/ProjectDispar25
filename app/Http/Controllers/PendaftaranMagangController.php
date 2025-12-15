<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PendaftaranMagang;

class PendaftaranMagangController extends Controller
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

            return view('landingpage.form.form-magang', [
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

        $validated = $request->validate([
            'nim' => 'required|string|max:50',
            'instansi' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'fakultas' => 'required|string|max:255',
            'pembimbing' => 'nullable|string|max:255',
            'nohp_pembimbing' => 'nullable|string|max:20',
            'tanggal_mulai' => 'required|date',
            'surat' => 'required|file|mimes:pdf|max:2048',
        ]);

        // upload surat
        $validated['surat'] = $request->file('surat')
            ->store('surat_magang', 'public');

        $validated['user_id'] = Auth::id();

        PendaftaranMagang::create($validated);

        return redirect()->route('dashboard')
            ->with('success', 'Pendaftaran Magang berhasil dikirim.');

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
