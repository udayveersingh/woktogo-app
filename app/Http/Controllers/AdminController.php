<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Return the admin dashboard view
        return view('admin.dashboard');
    }

    public function show_users()
    {
        // Retrieve all users from the database
        $users = User::all(); // or User::get(); - both work
    
        // Pass the users variable to the view
        return view('admin.users', ['users' => $users]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); // Fetch the user by ID
        return view('admin.edit_user', compact('user')); // Pass the user to the edit view
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id, // Ignore the current user's email
            'role' => 'required|in:user,admin,sub_admin',
        ]);

        // Find the user by ID
        $user = User::findOrFail($id);

        // Update the user's attributes
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        
        // Save the changes to the database
        $user->save();

        // Redirect back with a success message
        return redirect()->route('users.edit', $user->id)->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);
        
        // Delete the user
        $user->delete();

        // Redirect back to the users list with a success message
        return redirect()->route('show-user')->with('success', 'User deleted successfully!');
    }
    
}
