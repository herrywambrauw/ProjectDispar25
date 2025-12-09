<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;

Route::get('/', function () {
    return view('index');
});

Route::get('pendaftaran', function (){
    return view('landingpage.pendaftaran');
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

// Step 1
Route::get('/register-step1', function () {
    return view('auth.register-step1');
})->name('register.step1');

Route::post('/register-step1', [RegisteredUserController::class, 'storeStep1'])->name('register.step1.submit');

// Step 2
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
