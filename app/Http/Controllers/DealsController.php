<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DealsController extends Controller
{
    public function dealView()
    {
        if (Auth::check()) {
            if(Auth::user()->role == "admin"){
                return view('admin.dashboard');
            }else if(Auth::user()->role == "sub_admin"){
                return redirect()->route('owner_page');
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

    public function index()
    {
        $deals = Deal::all();
        return view('admin.deals.index', compact('deals'));
    }

    public function create()
    {
        return view('admin.deals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        Deal::create($request->all());
        return redirect()->route('admin.deals.index')->with('success', 'Deal created successfully.');
    }

    public function edit($id)
    {
        $deal = Deal::findOrFail($id);
        return view('admin.deals.edit', compact('deal'));
    }

    public function update(Request $request, $id)
    {
        $deal = Deal::findOrFail($id);
    
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Add more validation rules as needed
        ]);
    
        $deal->title = $request->title;
        $deal->description = $request->description;
        $deal->price = $request->price;
        $deal->deadline = $request->deadline; 
    
        // Handle image upload
        if ($request->hasFile('image')) {
            // Optionally delete the old image from storage
            if ($deal->image) {
                Storage::disk('public')->delete($deal->image);
            }
            $imagePath = $request->file('image')->store('deals', 'public');
            $deal->image = $imagePath; // Store the new image path
        }
    
        $deal->save();
    
        return redirect()->route('admin.deals.index')->with('success', 'Deal updated successfully.');
    }

    public function destroy($id)
    {
        $deal = Deal::findOrFail($id);
        $deal->delete();

        return redirect()->route('admin.deals.index')->with('success', 'Deal deleted successfully.');
    }

    public function owner_page(Request $request){
        return view('owner_page');
    }
}
