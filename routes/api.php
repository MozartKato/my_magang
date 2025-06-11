<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//auth routes
Route::post('/register',[AuthController::class,'registerSiswa']);
Route::post('/login', [AuthController::class,'login']);

//siswa routes
Route::middleware(['auth:sanctum',RoleMiddleware::class.':siswa'])->group(function(){
    Route::get('/siswa/profile',[SiswaController::class,'profile']);
    Route::get('/siswa/intern-place/{major_id?}',[SiswaController::class,'showInternPlace']);
});
