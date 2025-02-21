<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\UserPoint;
use App\Services\UserPointsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DealsController extends Controller
{
    public function dealView()
    {
        if (Auth::check()) {
            $data['user'] = Auth::user();

            $data['user_deals'] = DB::table('user_deals')
                ->join('deals', 'user_deals.deal_id', '=', 'deals.id') // Join user_deals and deals table
                ->where('user_id', '=', Auth::user()->id)
                ->select('user_deals.*') // Select columns you need
                ->latest('user_deals.created_at') // Or you can specify the order column for latest
                ->get();
            $data['user_points'] = UserPoint::where('user_id', '=', Auth::user()->id)->sum('points');
            // $data['all_deals'] =  Deal::latest()->get();

            $data['all_deals'] = Deal::latest()->get();
            if (!empty(Auth::user()->code_number)) {
                $data['user_qr'] = QrCode::format('png')->size(400)->generate(Auth::user()->code_number);
            }
            // Generate QR codes for each deal if applicable
            foreach ($data['all_deals'] as $item) {
                if (!empty($item->code_number)) {
                    $qrData =  $data['user']->code_number . '|' . $item->code_number;
                    $item->qr_code = QrCode::format('png')->size(400)->generate($qrData);
                } else {
                    $item->qr_code = null;
                }
            }
            return view('deals.my-deals', $data);
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
        // dd($deals);
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
        ]);

        $data = $request->all();
        $data['price'] = $request->input('price', 0); // Set price to 0 if not provided

        // Generate the unique identifier in the desired format
        $uniqueId = uniqid();

        $formattedId = 'DL ' . strtoupper(substr($uniqueId, 0, 3)) . ' ' . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
        // Generate the QR code
        $qrCodeImage = QrCode::format('png')->size(400)->generate($formattedId);

        // Check if the QR code image is generated
        if (empty($qrCodeImage)) {
            Log::error('QR code image is empty');
            return redirect()->back()->withErrors('Failed to generate QR code.');
        }

        // Ensure the directory exists
        if (!Storage::exists('deals/qrcodes')) {
            Storage::makeDirectory('deals/qrcodes');
        }

        // Save the QR code image to storage
        $fileName = 'deals/qrcodes/' . $formattedId . '.png';
        Storage::put($fileName, $qrCodeImage);

        $data['code_number'] =  $formattedId;
        $data['qr_code_path'] = $fileName;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Create a unique name for the image
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();

            // Move the uploaded file to the public/deals_img directory
            $request->file('image')->move(public_path('deals_img'), $imageName);

            // Store the image path in the database
            $data['image'] = 'deals_img/' . $imageName; // Save the new image path
        }

        // Create the deal with the updated data
        Deal::create($data);
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
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image' => 'nullable',
            // Add more validation rules as needed
        ]);

        $deal->title = $request->title;
        $deal->description = $request->description;
        $deal->deadline = $request->deadline;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Optionally delete the old image from public/deals_img
            if ($deal->image && file_exists(public_path($deal->image))) {
                unlink(public_path($deal->image));
            }

            // Create a unique name for the image
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();

            // Move the uploaded file to the public/deals_img directory
            $request->file('image')->move(public_path('deals_img'), $imageName);

            // Store the image path in the database
            $deal->image = 'deals_img/' . $imageName; // Save the new image path
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

    public function storeUserAction(Request $request)
    {
        // Assuming the actions are passed as an array
        $userActions = $request->input('actions'); // e.g. ['meal_and_drink', 'drink']

        $pointsService = new UserPointsService();
        $points = $pointsService->addPoints($userActions);

        // Save points to the user's points record
        $user = Auth::user(); // Get the authenticated user
        $userPoints = UserPoint::firstOrNew(['user_id' => $user->id]);
        $userPoints->points += $points;
        $userPoints->save();

        return response()->json(['points' => $userPoints->points]);
    }

    public function viewOtp(Request $request)
    {
        return view('view-otp');
    }
}
