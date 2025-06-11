<?php

use Illuminate\Support\Facades\Route;

// Route ke halaman home
Route::get('/', function () {
    return view('dashbord.home');
});

// Route ke halaman register
Route::get('/register', function () {
    return view('auth.register');
});

// Route ke halaman login
Route::get('/login', function () {
    return view('auth.login');
});

// (Opsional) Route dashboard per role
Route::get('/dashboard/admin', function () {
    return view('dashbord.admin');
});
Route::get('/dashboard/guru', function () {
    return view('dashbord.guru');
});
Route::get('/dashboard/siswa', function () {
    return view('dashbord.siswa');
});
