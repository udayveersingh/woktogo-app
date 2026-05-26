<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\User;
use App\Models\UserDeal;
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

    public function dealScanView()
    {
        return view('staff-scan.deal-scan');
    }


    public function dealScanPost(Request $request)
    {
        if ($request->input('user_code') &&  $request->input('deal_code')) {
            $user = User::where('code_number', $request->input('user_code'))->first();
            $deal = Deal::where('code_number', $request->input('deal_code'))->first();

            if (!empty($user) && !empty($deal)) {
                $user_deals = new UserDeal();
                $user_deals->user_id = $user->id;
                $user_deals->deal_id = $deal->id;
                $user_deals->status = 'in-active';
                $user_deals->save();
                $user_total_points = $user->total_points;
                $user_deals_points = DB::table('user_deals')
                    ->join('deals', 'user_deals.deal_id', '=', 'deals.id') // Join user_deals and deals table
                    ->where('user_id', '=',  $user->id)
                    ->select('deals.points') // Select columns you need
                    ->latest('user_deals.created_at')->first(); // Or you can specify the order column for latest
                $user->total_points =  $user_total_points - $user_deals_points->points;
                $user->save();


                // Redirect to a 'thank-you' page
                return redirect()->route('scan.page')->with('message', 'Deal has been registered successfully!');
                // }
            } else {
                return back()->with('error', 'User code and Deal code not found!');
            }
        } else {
            return back()->with('error', 'User code and Deal code not found!');
        }
    }
}
