<?php

namespace App\Http\Controllers;

use App\Models\InternPlace;
use Illuminate\Http\Request;
use App\Models\InternApply;

class InternController extends Controller
{
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

    public function showAllInternApply(Request $request, $status = null){
        $query = InternApply::query();

        if ($status !== null) {
            $query->where('status', $status);
        }

        $applies = $query->get();

        return response()->json([
            'status' => 'success',
            'data' => $applies
        ]);
    }
}
