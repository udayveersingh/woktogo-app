<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DealsController extends Controller
{
    public function dealView()
    {
        if (Auth::check()) {
            if(Auth::user()->role == "admin"){
                return view('admin.dashboard');
            }else{
                return view('deals.my-deals');
            }
        } else {
            return redirect("login");
        }
    }


    public function dealInfo()
    {
        if (Auth::check()) {
            return view('deals.deal-info');
        } else {
            return redirect("login");
        }
    }


    public function myAccount()
    {
        if (Auth::check()) {
            return view('my-account');
        } else {
            return redirect("login");
        }
    }
}
