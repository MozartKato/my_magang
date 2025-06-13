<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InternApply;

class AdminContoller extends Controller
{
    public function actionInternApply(Request $request)
    {
        try {
            $validated = $request->validate([
                'group_code' => 'required',
                'status' => 'required|in:approved,rejected',
                'rejection_reason' => 'nullable|string',
            ]);

            $internApplies = InternApply::where('group_code', $validated['group_code'])->get();

            if ($internApplies->isEmpty()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No applications found for the given group code.',
                    'data' => null,
                ], 404);
            }

            foreach ($internApplies as $internApply) {
                $internApply->status = $validated['status'];
                if ($validated['status'] === 'rejected') {
                    $internApply->rejection_reason = $validated['rejection_reason'];
                } else {
                    $internApply->rejection_reason = null;
                }
                $internApply->save();
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Intern applications updated successfully.',
                'data' => $internApplies,
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'data' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while processing your request.',
                'data' => $e->getMessage(),
            ], 500);
        }
    }
}
