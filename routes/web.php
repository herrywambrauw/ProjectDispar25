<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;

Route::get('/', function () {
    return view('index');
});

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

Route::get('detail-pks', function(){
    return view('landingpage.detail-pks');
});

Route::get('dokumentasi', function(){
    return view('landingpage.dokumentasi');
});

Route::get('detail-dokumentasi', function(){
    return view('landingpage.detail-dokumentasi');
});

Route::get('kerjasama', function(){
    return view('landingpage.kerjasama');
});

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

Route::get('dashboard-magang', function(){
    return view('dashboard.peserta.magang.dashboard-magang');
});

// Step 1
Route::get('/register-step1', function () {
    return view('auth.register-step1');
})->name('register.step1');

Route::post('/register-step1', [RegisteredUserController::class, 'storeStep1'])->name('register.step1.submit');

Route::get('/register-step2', function () {
    return view('auth.register-step2');
})->name('register.step2');

Route::post('/register-step2', [RegisteredUserController::class, 'storeStep2'])->name('register.step2.submit');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
