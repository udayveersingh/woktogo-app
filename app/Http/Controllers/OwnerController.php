<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class OwnerController extends Controller
{
    public function owner_page(Request $request)
    {
        return view('owner_page');
    }

    public function owner_scan_one(Request $request)
    {
        return view('owner_scan_one');
    }

    public function owner_scan_two(Request $request)
    {
        $user_qr = QrCode::format('png')->size(400)->generate(Auth::user()->name);
        $test = "test";
        return view('owner_scan_two', compact('user_qr', 'test'));
    }
}
