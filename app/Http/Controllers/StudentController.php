<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\InternPlace;
use App\Models\InternApply;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function profile(Request $request)
    {
        // Mendapatkan user dari token
        $user = $request->user();

        // Mendapatkan data student terkait user
        $student = Student::with('major')->where('user_id', $user->id)->first();

        return response()->json([
            'status' => 'success',
            'data' => [
                'name' => $user->name,
                'nis' => $student->nis,
                'email' => $user->email,
                'phone' => $student->phone,
                'class' => $student->class,
                'major' => [
                    'id' => $student->major_id,
                    'name' => $student->major->name,
                    'code' => $student->major->code
                ],
                'role' => $user->role,
                'user_id' => $student->user_id,
                'address' => $student->address
            ]
        ]);
    }

    public function showInternPlace(Request $request){
        $query = InternPlace::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('address')) {
            $query->where('address', 'like', '%' . $request->address . '%');
        }

        $place = $query->get();

        return response()->json([
            'status' => 'success',
            'data' => $place->map(function($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'address' => $item->address
                ];
            })
        ]);
    }

    public function applyIntern(Request $request)
    {
        $request->validate([
            'nis' => 'required|array',
            'nis.*' => 'required|distinct|exists:students,nis',
            'intern_place_name' => 'required',
            'intern_place_address' => 'required',
        ]);

        // Cek atau buat tempat magang baru
        $internPlace = InternPlace::firstOrCreate(
            ['name' => $request->intern_place_name],
            ['address' => $request->intern_place_address]
        );

        $user = $request->user();
        $student = Student::where('user_id', $user->id)->first();
        $group_code = Str::random(8); // Generate kode unik untuk kelompok

        foreach ($request->nis as $nis) {
            $studentObj = Student::where('nis', $nis)->first();
            if ($studentObj) {
                InternApply::create([
                    'student_id' => $studentObj->id,
                    'intern_place_id' => $internPlace->id,
                    'group_code' => $group_code,
                    'is_leader' => $studentObj->id === $student->id // Ketua kelompok adalah yang membuat pendaftaran
                ]);
            }
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Pendaftaran magang berhasil dibuat',
            'data' => [
                'group_code' => $group_code,
                'intern_place' => [
                    'id' => $internPlace->id,
                    'name' => $internPlace->name,
                    'address' => $internPlace->address
                ]
            ]
        ]);
    }
}

