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

        // Update the user's name
        $user->name = $request->name;
        
        // Example of saving the image
        $file = $request->file('thumbnail'); // Assuming you have the file object from the request

        // Define the filename (you can customize this as needed)
        $filename = time() . '_' . $file->getClientOriginalName(); // Or use any other naming logic

        // Define the full path to the thumbnails directory (based on your server path)
        $path = public_path('thumbnails');  // public_path() maps to the public directory, and 'thumbnails' is where you want to store the file

        // Make sure the thumbnails directory exists
        if (!file_exists($path)) {
            mkdir($path, 0755, true); // Create the directory if it doesn't exist
        }

        // Move the uploaded file to the desired location
        $file->move($path, $filename);  // This will move the file to the thumbnails folder

        // Now, $filename contains the name of the file in the directory
        $storedFilePath = 'thumbnails/' . $filename;  // This is the relative path for storage
        $user->thumbnail = $storedFilePath;  // Save the relative path to the database (e.g., for user profile thumbnail)
        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
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
