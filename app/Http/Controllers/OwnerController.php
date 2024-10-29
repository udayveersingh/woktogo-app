<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function ownerScanPost(Request $request)
    {
        $request->session()->put('user_points.user_code', $request->input('user_code'));
        $data = $request->session()->all();
        $user_assign_points = $data['user_points'];
        $total_points =  $user_assign_points['total_points'];
        $user_code = $user_assign_points['user_code'];
        $user = User::where('code_number', '=', $user_code)->first();
        $user_points = new UserPoint();
        $user_points->user_id =  $user->id;
        $user_points->points = $total_points;
        $user_points->save();
        // Clear the session after successful registration
        return redirect()->route('owner_scan_two_view')->withSuccess('Thankyou.');
    }

    public function owner_scan_two(Request $request)
    {
        $user_qr = QrCode::format('png')->size(400)->generate(Auth::user()->name);
        // $user_qr = QrCode::format('png')->size(400)->generate("Ravi");
        $test = "test";
        return view('owner_scan_two', compact('user_qr', 'test'));
    }

    public function viewOtp(Request $request)
    {
        return view('view-otp');
    }
}
