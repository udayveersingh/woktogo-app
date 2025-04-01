<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Mail\SupportRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
    /**
     * Show the form for resetting the password.
     *
     * @param  Request  $request
     * @param  string  $token
     * @return \Illuminate\View\View
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with([
            'token' => $token,
            'email' => $request->email,
        ]);
    }

    /**
     * Handle a password reset request.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|regex:/[A-Z]/|regex:/[@$!%*?&]/|max:255|confirmed',
            'token' => 'required',
        ]);

        // Find the user by the provided email address
        $user = User::where('email', $request->email)->first();

        // Check if the user exists and the password reset token is valid
        if (!$user || !Password::broker()->tokenExists($user, $request->token)) {
            throw ValidationException::withMessages(['email' => [__('The provided email or token is invalid.')]]);
        }

        // Update the user's password
        $user->password = Hash::make($request->password);
        $user->save();

        // Optionally log the user in after reset
        // auth()->login($user);

        return redirect()->route('login')->with('status', __('Your password has been reset! You can now log in.'));
    }


    public function showSupportForm()
    {
        return view('support');
    }


    public function sendSupportEmail(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Send the email
        Mail::to('kern@brown-brown.nl')->send(new SupportRequest(
            $validated['name'],
            $validated['email'],
            $validated['message']
        ));

        if (Auth::check()) {
        return back()->with('success', 'Your message has been sent!');
        }else{
            return redirect('login')->with('success', 'Your message has been sent!');
        }
    }
}
