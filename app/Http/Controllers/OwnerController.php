<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function owner_page(Request $request){
        return view('owner_page');
    }

    public function owner_scan_one(Request $request){
        return view('owner_scan_one');
    }
}
