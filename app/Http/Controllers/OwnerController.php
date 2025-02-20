<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\User;
use App\Models\UserDeal;
use App\Models\UserPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

            return view('owner_page');
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
        // Process the QR code data as needed
        return response()->json(['message' => 'QR code scanned successfully!', 'data' => $data]);
    }

    public function ownerScanPost(Request $request)
    {
        $request->session()->put('user_points.user_code', $request->input('user_code'));
        $data = $request->session()->all();
        $user_assign_points = $data['user_points'];
        $total_points =  $user_assign_points['total_points'];
        $user_code = $user_assign_points['user_code'];
        $user = User::where('code_number', '=', $user_code)->first();
        if (!empty($user)) {
            $user_points = new UserPoint();
            $user_points->user_id =  $user->id;
            $user_points->points = $total_points;
            $user_points->save();
            // Clear the session after successful registration
            return redirect()->route('owner_scan_two_view')->withSuccess('You have user points has been assigned successfully.');
        } else {
            return redirect()->route('owner_scan_one_view')->withError('Oppes! You have entered invalid user code');
        }
    }


    public function owner_scan_two(Request $request)
    {
        // $user_qr = QrCode::format('png')->size(400)->generate(Auth::user()->name);
        // // $user_qr = QrCode::format('png')->size(400)->generate("Ravi");
        // $test = "test";
        // return view('owner_scan_two', compact('user_qr', 'test'));
        return view('thank-you');
    }

    public function deal_scan_one()
    {
        return view('deal_scan_one');
    }


    public function dealScanPost(Request $request)
    {
        $user = User::where('code_number',$request->user_code)->first();
        $deal = Deal::where('code_number',$request->deal_code)->first();

        $user_deals = new UserDeal();
        $user_deals->user_id = $user->id;
        $user_deals->deal_id = $deal->id;
        $user_deals->status = 'in-active';
        $user_deals->save();
        return view('thank-you');
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
