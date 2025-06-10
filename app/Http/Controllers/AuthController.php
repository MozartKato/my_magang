<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\Siswa;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => 'success',
                'user' => $user,
                'token' => $token
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Email atau password salah'
            ], 401);
        }
    }

    public function registerSiswa(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'nis' => 'required|unique:siswas,nis',
            'address' => 'required',
            'phone' => 'required|unique:siswas,phone',
            'class' => 'required',
            'major_id' => 'required'
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => 'siswa'
        ]);

        $siswa = Siswa::create([
            'user_id' => $user->id,
            'nis' => $validatedData['nis'],
            'address' => $validatedData['address'],
            'phone' => $validatedData['phone'],
            'class' => $validatedData['class'],
            'major_id' => $validatedData['major_id'],
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'user' => $user,
            'siswa' => $siswa,
            'token' => $token
        ], 201);
    }

}
