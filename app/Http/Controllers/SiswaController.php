<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function profile(Request $request)
    {
        // Mendapatkan user dari token
        $user = $request->user();

        // Mendapatkan data siswa terkait user
        $siswa = Siswa::where('user_id', $user->id)->first();

        return response()->json([
            'user' => $user,
            'siswa' => $siswa,
        ]);
    }
}

