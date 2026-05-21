<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function scanPage()
    {
        return view('staff-scan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function scanQr(Request $request)
    {
        $request->validate([
            'code' => 'required|string'
        ]);

        $code = trim($request->code);

        // Find user by code_number
        $customer = User::where('code_number', $code)->first();

        // OR if QR contains image path code
        // $customer = User::where('qr_code_path', $code)->first();

        if (!$customer) {

            return response()->json([
                'success' => false,
                'message' => 'Customer not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'customer' => [
                'id' => $customer->id,
                'name' => $customer->name,
                'points' => $customer->total_points
            ]
        ]);
    }

    public function awardPoints(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'points' => 'required|integer|min:1'
        ]);

        DB::beginTransaction();

        try {

            $user = User::findOrFail($request->user_id);

            // Update total points
            $user->total_points += $request->points;

            $user->save();

            // Insert transaction log
            DB::table('user_points')->insert([

                'user_id' => $user->id,

                'points' => $request->points,

                'created_at' => now(),

                'updated_at' => now()
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'new_balance' => $user->total_points
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong'
            ], 500);
        }
    }
}
