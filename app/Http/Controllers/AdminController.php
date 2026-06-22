<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Response;
use App\Models\User;
use App\Models\UserDeal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Return the admin dashboard view
        // return view('admin.dashboard');
        if (Auth::check()) {
            $data['totalUsers'] = User::where('role', '=', 'user')->count();
            $data['totalDeals'] = Deal::count();
            $data['totalClaims'] = UserDeal::count();
            $data['totalPointsAwarded'] = DB::table('user_points')->sum('points');
            $data['totalVisits'] = DB::table('app_visits')->count();
            $data['totalQrScans'] = DB::table('qr_scan_logs')->count();
            $data['topDeals'] = DB::table('user_deals')
                ->join('deals', 'user_deals.deal_id', '=', 'deals.id')
                ->select(
                    'deals.title',
                    DB::raw('COUNT(*) as total_claims')
                )->groupBy('deals.id', 'deals.title')
                ->orderByDesc('total_claims')
                ->get();
            // Redirect based on role
            return view('admin.dashboard', $data);
        }
        return view('auth.login');
    }

    public function show_users()
    {
        // Retrieve all users from the database
        $users = User::where('role', '!=', 'admin')->latest()->get(); // or User::get(); - both work

        // Pass the users variable to the view
        return view('admin.users', ['users' => $users]);
    }

    public function edit($id)
    {
        $user = User::findOrFail(decrypt($id)); // Fetch the user by ID
        return view('admin.edit_user', compact('user')); // Pass the user to the edit view
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id, // Ignore the current user's email
            'role' => 'required|in:user,admin,sub_admin,staff',
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
        return redirect()->route('show-user')->with('success', 'User updated successfully!');
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

    public function view($id)
    {
        $user = User::find($id);
        $responses = DB::table('responses')
            ->join('questions', 'responses.question_id', '=', 'questions.id')
            ->join('options', 'responses.option_id', '=', 'options.id')
            ->where('responses.user_id', $user->id)
            ->select('questions.question_text as question_text', 'options.option_text as answer_text')
            ->get();

        return view('admin.view', compact('user', 'responses'));
    }
}
