<?php

use Illuminate\Support\Facades\Route;

// Route ke halaman home
Route::get('/', function () {
    return view('welcome');
});

// Route ke halaman register
Route::get('/register', function () {
    return view('auth.register');
});

// Route ke halaman login
Route::get('/login', function () {
    return view('auth.login');
});

// Dashboard routes
Route::get('/dashboard/student', function () {
    return view('dashboard.student');
});

Route::get('/dashboard/teacher', function () {
    return view('dashboard.teacher');
});

Route::get('/dashboard/admin', function () {
    return view('dashboard.admin');
});
