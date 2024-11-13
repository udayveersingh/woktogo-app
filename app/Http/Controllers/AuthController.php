<?php

namespace App\Http\Controllers;

use App\Models\Response;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        // return view('auth.login');
        // if(!(Auth::check())){
        //     return view('auth.login');
        // }else{
        //     return redirect()->route('my-deals');
        // }

        if (Auth::check()) {
            // Redirect based on role
            return match (Auth::user()->role) {
                'admin' => redirect()->route('dashboard'),
                'sub_admin' => redirect()->route('owner_page'),
                default => redirect('/my-deals'), // Default for other roles
            };
        }

        return view('auth.login');
    }


    public function postLogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return match (Auth::user()->role) {
                'admin' => redirect()->route('dashboard'),
                'sub_admin' => redirect()->route('owner_page'),
                default => redirect('/my-deals'), // Default for other roles
            };
            // return redirect()->intended('/my-deals')
            //             ->withSuccess('You have Successfully loggedin.');
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
            'email' => 'required|email|unique:users,email',
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
        $questions = DB::table('questions')
            ->leftJoin('options', 'options.question_id', '=', 'questions.id')
            ->select('questions.id as question_id', 'questions.question_text as question_text', 'options.id as option_id', 'options.option_text as option_text')
            ->get();

        // dd($formattedQuestions);

        $formattedQuestions = $questions->groupBy('question_id')->map(function ($questionGroup) {
            return [
                'question_text' => $questionGroup->first()->question_text,
                'question_id' => $questionGroup->first()->question_id,
                'options' => $questionGroup->map(function ($item) {
                    return [
                        'option_id' => $item->option_id,
                        'option_text' => $item->option_text,
                    ];
                })->toArray()
            ];
        });

        // dd($formattedQuestions);

        return view('auth.register-step3', compact('formattedQuestions'));
    }

    public function postStep3(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required',
            'phone' => 'required|max:15',
        ]);

        $request->session()->put('registration.name', $request->input('name'));
        $request->session()->put('registration.date_of_birth', $request->input('date_of_birth'));
        $request->session()->put('registration.phone', $request->input('phone'));

        $request->session()->put('registration.responses', $request->input('responses'));

        $allSessionVariables = Session::all();

        // dd($allSessionVariables);

        return redirect()->route('register.step4.show');
    }

    public function showStep4(Request $request)
    {
        // Optionally retrieve all data for display
        $data = $request->session()->all();
        $regisData = $data['registration'];

        // Generate the unique identifier in the desired format
        $uniqueId = uniqid();

        $formattedId = 'CF ' . strtoupper(substr($uniqueId, 0, 3)) . ' ' . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
        // Generate the QR code
        $qrCodeImage = QrCode::format('png')->size(400)->generate($formattedId);

        // Check if the QR code image is generated
        if (empty($qrCodeImage)) {
            Log::error('QR code image is empty');
            return redirect()->back()->withErrors('Failed to generate QR code.');
        }

        // Ensure the directory exists
        if (!Storage::exists('qrcodes')) {
            Storage::makeDirectory('qrcodes');
        }

        // Save the QR code image to storage
        $fileName = 'qrcodes/' . $formattedId . '.png';
        Storage::put($fileName, $qrCodeImage);
        $user = new User();
        $user->name =  $regisData['name'];
        $user->email =  $regisData['email'];
        $user->password = Hash::make($regisData['password']);
        $user->date_of_birth = $regisData['date_of_birth'];
        $user->phone = $regisData['phone'];
        $user->code_number = $formattedId;
        $user->qr_code_path = $fileName;
        $user->save();

        if (!empty($regisData['responses']) && count($regisData['responses']) > 0) {
            // Save responses in the responses table
            foreach ($regisData['responses'] as $questionId => $answer) {
                DB::table('responses')->insert([
                    'user_id' => $user->id,
                    'question_id' => $questionId,
                    'option_id' => $answer,
                    'created_at' => now(),
                ]);
            }
        }

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
