<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\PendaftaranPKLController;
use App\Http\Controllers\PendaftaranPenelitianController;



// Bagian Pendaftaran
Route::middleware(['auth'])->group(function () {
    Route::get('/pkl/daftar', [PendaftaranPKLController::class, 'create'])
        ->name('pkl.create');

    Route::post('/pkl/daftar', [PendaftaranPKLController::class, 'store'])
        ->name('pkl.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/penelitian/daftar', [PendaftaranPenelitianController::class, 'create'])
        ->name('penelitian.create');

    Route::post('/penelitian/daftar', [PendaftaranPenelitianController::class, 'store'])
        ->name('penelitian.store');
});





Route::get('/', function () {
    return view('landingpage.index');
});

// Route::get('utama', function (){
//     return view('landingpage.index');
// });

Route::get('pendaftaran', function (){
    return view('landingpage.pendaftaran');
});

Route::get('mou', function(){
    return view('landingpage.mou');
});

Route::get('detail-mou', function(){
    return view('landingpage.detail-mou');
});

Route::get('pks', function(){
    return view('landingpage.pks');
});

Route::get('/detail-pks/{id}', function ($id) {
    return view('landingpage.detail-pks', compact('id'));
})->name('detail-pks');

Route::get('dokumentasi', function(){
    return view('landingpage.dokumentasi');
});

Route::get('/detail-dokumentasi/{id}', function ($id) {
    return view('landingpage.detail-dokumentasi', compact('id'));
})->name('detail-dokumentasi');

Route::get('dashboard-admin', function(){
    return view('dashboard.admin.dashboard-admin');
});

Route::get('form-magang', function(){
    return view('landingpage.form.form-magang');
});

Route::get('form-kkn', function(){
    return view('landingpage.form.form-kkn');
});

Route::get('form-penelitian', function(){
    return view('landingpage.form.form-penelitian');
});

Route::get('form-pkl', function(){
    return view('landingpage.form.form-pkl');
});




// Dashboard Peserta Magang

Route::get('dashboard-magang', function(){
    return view('dashboard.peserta.magang.dashboard-magang');
});

Route::get('log-aktivitas', function(){
    return view('dashboard.peserta.magang.log-aktivitas');
});

Route::get('unggah-laporan', function(){
    return view('dashboard.peserta.magang.unggah-laporan');
});

Route::get('unggah-kegiatan', function(){
    return view('dashboard.peserta.magang.unggah-kegiatan');
});

Route::get('profil-pengguna', function(){
    return view('dashboard.peserta.magang.profil-pengguna');
});

//Batas Pendaftaran






// Pendaftaran Akun User
Route::get('/register-step1', function () {
    return view('auth.register-step1');
})->name('register.step1');

Route::post('/register-step1', [RegisteredUserController::class, 'storeStep1'])
    ->name('register.step1.submit');

Route::get('/register-step2', function () {
    if (!session()->has('register_step1')) {
        return redirect()->route('register.step1');
    }
    return view('auth.register-step2');
})->name('register.step2');

Route::post('/register-step2', [RegisteredUserController::class, 'storeStep2'])
    ->name('register.step2.submit');

Route::post('/register-confirm', [RegisteredUserController::class, 'confirmRegister'])
    ->name('register.confirm');












// dashboard pemasaran
Route::get('dashboard-pemasaran', function(){
    return view('dashboard.pemasaran.dashboard-pemasaran');
});
Route::get('kegiatan', function(){
    return view('dashboard.pemasaran.kegiatan');
});

Route::get('unggah-mou', function(){
    return view('dashboard.pemasaran.unggah-mou');
});

Route::get('unggah-pks', function(){
    return view('dashboard.pemasaran.unggah-pks');
});



Route::get('dashboard-pendaftar', function(){
    return view('dashboard.pendaftar.dashboard-pendaftar');
});

Route::get('dashboard-admin', function(){
    return view('dashboard.admin.dashboard-admin');
});

Route::get('dashboard-pkl', function(){
    return view('dashboard.peserta.pkl.dashboard-pkl');
});

Route::get('dashboard-penelitian', function(){
    return view('dashboard.peserta.penelitian.dashboard-penelitian');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

