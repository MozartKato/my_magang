<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//auth routes
Route::post('/register',[AuthController::class,'registerStudent']);
Route::post('/login', [AuthController::class,'login']);

//student routes
Route::middleware(['auth:sanctum',RoleMiddleware::class.':student'])->group(function(){
    Route::get('/student/profile',[StudentController::class,'profile']);
    Route::get('/student/intern-place',[StudentController::class,'showInternPlace']);
    Route::post('/student/apply-intern',[StudentController::class,'applyIntern']);
});
