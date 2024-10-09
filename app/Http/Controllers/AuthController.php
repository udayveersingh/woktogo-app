<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
   /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        if(!(Auth::check())){
        return view('auth.login');
        }else{
            return redirect()->route('my-deals');
        }
    }  


    public function postLogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/my-deals')
                        ->withSuccess('You have Successfully loggedin.');
        }
  
        return redirect("login")->withError('Oppes! You have entered invalid credentials');
    }

   
    public function registration()
    {
        return view('auth.register');
    }

    public function postStep1(Request $request)
    {
        $request->validate([
            'email' => 'required|string|max:255',
            // other validations...
        ]);

        // Store data in the session
        $request->session()->put('registration.email', $request->input('email'));

        return redirect()->route('register.step2.show');
    }


    public function showStep2()
    {
        return view('auth.register-step2');
    }

    public function postStep2(Request $request)
    {
        $request->validate([
            'password' => 'required|string|max:255',

        ]);

        $request->session()->put('registration.password', $request->input('password'));

        return redirect()->route('register.step3.show');
    }


    public function showStep3()
    {
        return view('auth.register-step3');
    }

    public function postStep3(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required',
            'phone' => 'required'
        ]);

        $request->session()->put('registration.name', $request->input('name'));
        $request->session()->put('registration.date_of_birth', $request->input('date_of_birth'));
        $request->session()->put('registration.phone',$request->input('phone'));

        return redirect()->route('register.step4.show');
    }

    public function showStep4(Request $request)
    {

        // Optionally retrieve all data for display
        $data = $request->session()->all();
        $regisData = $data['registration'];
        $user = new User();
        $user->name =  $regisData['name'];
        $user->email =  $regisData['email'];
        $user->password = Hash::make($regisData['password']);
        $user->date_of_birth = $regisData['date_of_birth'];
        $user->phone = $regisData['phone'];
        $user->save();

        // Clear the session after successful registration
        $request->session()->flush();
        return redirect()->route('login')->withSuccess('You have registration Successfully.'); // or wherever you want to redirect
    }

    // public function postFinalStep(Request $request)
    // {
    //     $request->validate([
    //         'field4' => 'required|string|max:255',
    //         // other validations...
    //     ]);

    //     // Retrieve all data from the session
    //     $data = $request->session()->all();
    //     // Example: Create a new user or save data to the database
    //     // User::create([...]);

    //     // Clear the session after successful registration
    //     $request->session()->flush();

    //     return redirect()->route('home'); // or wherever you want to redirect
    // }


    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }

}
