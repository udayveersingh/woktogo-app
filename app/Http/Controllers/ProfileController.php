<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('edit-profile', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();

        $user->name = $request->name;

        // Check if file uploaded
        if ($request->hasFile('thumbnail')) {

            $file = $request->file('thumbnail');

            $filename = time() . '_' . $file->getClientOriginalName();

            $path = public_path('thumbnails');

            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            $file->move($path, $filename);

            $storedFilePath = 'thumbnails/' . $filename;

            $user->thumbnail = $storedFilePath;
        }

        $user->save();

        return redirect()->route('profile.edit')
            ->with('success', 'Profile updated successfully.');
    }

    public function showChangePasswordForm()
    {
        return view('change-password');
    }

    public function changePassword(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // Check if the current password is correct
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'The provided password does not match our records.']);
        }

        // Update the password
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('password.change')->with('success', 'Password changed successfully.');
    }
}
