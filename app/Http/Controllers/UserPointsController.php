<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\UserPoint;
use Illuminate\Http\Request;

class UserPointsController extends Controller
{
    //
    public function index()
    {
        $points = Point::get(); // Assuming you want to show user info too
        return view('admin.userpoints.index', compact('points'));
    }

    public function create()
    {
        return view('admin.userpoints.create');
    }

    public function store(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'description' => 'required|string|max:255',
            'points' => 'required|integer',
        ]);

        // Generate identifier from description
        $identifier = strtolower(str_replace(' ', '_', $request->input('description')));

        // Check if the identifier already exists
        if (Point::where('identifier', $identifier)->exists()) {
            return redirect()->back()->withErrors(['description' => 'Identifier already exists. Please choose a different description.']);
        }

        
        // Create the new point entry
        Point::create([
            'identifier' => $identifier,
            'description' => $request->input('description'),
            'points' => $request->input('points'),
        ]);

        return redirect()->route('admin.points.index')->with('success', 'Points entry created successfully.');
    }
}
