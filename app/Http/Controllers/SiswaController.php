<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\InternPlace;

class SiswaController extends Controller
{
    public function profile(Request $request)
    {
        // Mendapatkan user dari token
        $user = $request->user();

        // Mendapatkan data siswa terkait user
        $siswa = Siswa::with('major')->where('user_id', $user->id)->first();

        return response()->json([
            'status' => 'success',
            'data' => [
                'name' => $user->name,
                'nis' => $siswa->nis,
                'email' => $user->email,
                'phone' => $siswa->phone,
                'class' => $siswa->class,
                'major' => [
                    'id' => $siswa->major_id,
                    'name' => $siswa->major->name,
                    'code' => $siswa->major->code
                ],
                'role' => $user->role,
                'user_id' => $siswa->user_id,
                'address' => $siswa->address
            ]
        ]);
    }

    public function showInternPlace(Request $request, $major_id = null){
        if(!$major_id){
            $place = InternPlace::with('major')->get();

            return response()->json([
                'status' => 'success',
                'data' => $place->map(function($item) {
                    return [
                        'id' => $item->id,
                        'name' => $item->name,
                        'address' => $item->address,
                        'major' => [
                            'id' => $item->major->id,
                            'name' => $item->major->name,
                            'code' => $item->major->code
                        ]
                    ];
                })
            ]);
        }

        $place = InternPlace::with('major')
            ->where('major_id', $major_id)
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $place->map(function($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'address' => $item->address,
                    'major' => [
                        'id' => $item->major->id,
                        'name' => $item->major->name,
                        'code' => $item->major->code
                    ]
                ];
            })
        ]);
    }

    public function applyIntern(Request $request){
        $request->validate([
            'intern_place_name' => 'required|string',
            'group_code' => 'nullable|string',
            'intern_address' => 'required|string',
            'siswa_nis' => 'required',
        ]);
        
        $checkInternPlace = InternPlace::where('name', $request->intern_place_name)->first();
        $siswa = Siswa::where('user_id', auth()->user()->id)->first();
        $siswaNis = Siswa::where('nis', $request->siswa_nis)->first();

        if(!$checkInternPlace){
            // Buat tempat magang baru
            $checkInternPlace = InternPlace::create([
                'name' => $request->intern_place_name,
                'major_id' => $siswa->major_id,
                'address' => $request->intern_address
            ]);
        }

        $existingApply = InternApply::where('siswa_id', $siswa->id)
            ->where('status', 'pending')
            ->first();

        if($existingApply){
            return response()->json([
                'status' => 'error',
                'message' => 'Anda sudah memiliki pengajuan PKL yang pending'
            ], 400);
        }

        $apply = InternApply::create([
            'siswa_id' => $siswa->id,
            'major_id' => $siswa->major_id,
            'intern_place_name' => $request->intern_place_name,
            'group_code' => $request->group_code,
            'status' => 'pending'
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Pengajuan PKL berhasil dibuat',
            'data' => $apply
        ]);
    }

}

