<?php

namespace App\Http\Controllers;

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
            //     'sub_admin' => redirect()->route('owner_page'),
            //     default => redirect('/my-deals'), // Default for other roles
            // };
            return view('owner_page');
        }

        return view('auth.login');
    }

    public function owner_scan_one(Request $request)
    {
        return view('owner_scan_one');
    }

    public function owner_scan_two(Request $request)
    {
        // $user_qr = QrCode::format('png')->size(400)->generate(Auth::user()->name);
        $user_qr = QrCode::format('png')->size(400)->generate("Ravi");
        $test = "test";
        return view('owner_scan_two', compact('user_qr', 'test'));
    }
}
