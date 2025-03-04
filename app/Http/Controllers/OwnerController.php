<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\User;
use App\Models\UserDeal;
use App\Models\UserPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class OwnerController extends Controller
{
    public function owner_page(Request $request)
    {
        // return view('owner_page');
        if (Auth::check()) {
            // Redirect based on role
            // return match (Auth::user()->role) {
            //     'admin' => redirect()->route('dashboard'),
            //     'sub_admin' =>view('owner_page'),
            //     default => redirect('/my-deals'), // Default for other roles
            // };

            $data['drinkPoint'] = DB::table('points')->where('identifier', '=', 'drinks')->first();
            $data['mealPoint'] = DB::table('points')->where('identifier', '=', 'meal_and_drink')->first();
            $data['Snack'] = DB::table('points')->where('identifier', '=', 'meal_or_snack')->first();
            return view('owner_page', $data);
        }

        return view('auth.login');
    }



    public function postOwnerPage(Request $request)
    {
        // Store data in the session
        $request->session()->put('user_points.total_points', $request->input('total_points'));
        return redirect()->route('owner_scan_one_view');
    }

    public function owner_scan_one(Request $request)
    {
        return view('owner_scan_one');
    }

    public function scan(Request $request)
    {
        $data = $request->input('data');
        // Process the QR code data as needed
        return response()->json(['message' => 'QR code scanned successfully!', 'data' => $data]);
    }

    public function scanDeal(Request $request)
    {
        $data = $request->input('data');
        // Split the data based on the space separator
        $parts = explode(' ', $data);
        // Further split the third part (which is "813|DL") into two parts
        $dealPart = explode('|', $parts[2]);

        // Assign the corresponding parts to $user and $deal
        $user = $parts[0] . ' ' . $parts[1] . ' ' . $dealPart[0]; // "CF 67B 813"
        $deal = $dealPart[1] . ' ' . $parts[3] . ' ' . $parts[4]; // "DL 67B 751"
        // Return the result as a response
        return response()->json([
            'message' => 'QR code scanned successfully!',
            'user' => $user,
            'deal' => $deal
        ]);
    }

    public function ownerScanPost(Request $request)
    {
        $request->session()->put('user_points.user_code', $request->input('user_code'));
        $data = $request->session()->all();
        $user_assign_points = $data['user_points'];

        // Replace commas with dots
        $user_assign_points['total_points'] = str_replace(',','', $user_assign_points['total_points']);

        // Check if there are more than one dot
        if (substr_count($user_assign_points['total_points'], '.') > 1) {
            // Split by dot and take the first part (before any additional dots)
            $user_assign_points['total_points'] = explode('.', $user_assign_points['total_points'])[0];

            // Calculate based on this first part, rounding up and multiplying by 1 (as per your request)
            $total_points = ceil(floatval($user_assign_points['total_points']) * 1);
        } else {
            // If there's only one dot, use the full value
            $total_points = ceil(floatval($user_assign_points['total_points']) * 1);
        }

        // Output the result for debugging
        $user_code = $user_assign_points['user_code'];
        $user = User::where('code_number', '=', $user_code)->first();
        if (!empty($user)) {
            $user_points = new UserPoint();
            $user_points->user_id =  $user->id;
            $user_points->points = $total_points;
            $user_points->save();
            // Clear the session after successful registration
            return redirect()->route('owner_scan_two_view', $user_points->id)->withSuccess('You have user points has been assigned successfully.');
        } else {
            return redirect()->route('owner_scan_one_view')->withError('Oppes! You have entered invalid user code');
        }
    }

    public function owner_scan_two($id)
    {
        // $user_qr = QrCode::format('png')->size(400)->generate(Auth::user()->name);
        // // $user_qr = QrCode::format('png')->size(400)->generate("Ravi");
        // $test = "test";
        // return view('owner_scan_two', compact('user_qr', 'test'));
        $user_points = UserPoint::find($id);

        return view('thank-you', compact('user_points'));
    }

    public function deal_scan_one()
    {
        return view('deal_scan_one');
    }


    public function dealScanPost(Request $request)
    {
        if ($request->input('user_code') &&  $request->input('deal_code')) {
            $user = User::where('code_number', $request->input('user_code'))->first();
            $deal = Deal::where('code_number', $request->input('deal_code'))->first();

            if (!empty($user) && !empty($deal)) {
                $user_deal = UserDeal::where('user_id', '=', $user->id)
                    ->where('deal_id', '=', $deal->id)
                    ->first();

                if (empty($user_deal)) {
                    $user_deals = new UserDeal();
                    $user_deals->user_id = $user->id;
                    $user_deals->deal_id = $deal->id;
                    $user_deals->status = 'in-active';
                    $user_deals->save();

                    // Redirect to a 'thank-you' page
                    return redirect()->route('owner_scan_deal_view')->with('message', 'Deal has been registered successfully!');
                }
            } else {
                return back()->with('error', 'User code and Deal code not found!');
            }
        } else {
            return back()->with('error', 'User code and Deal code not found!');
        }
    }

    public function DealScanned()
    {
        return view('thank-you');
    }


    public function viewOtp(Request $request)
    {
        return view('view-otp');
    }
}
