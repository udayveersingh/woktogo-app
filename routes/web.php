<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DealsController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\UserPointsController;
use App\Models\UserPoint;
use Illuminate\Support\Facades\File;

// Route::get('/', function () {  return view('auth.login'); });
// Route::get('/login', function () {  return view('loginStep2'); });
// Route::get('/login2', function () {  return view('loginStep3'); });
// Route::get('/register', function () {  return view('register'); });
// Route::get('/register2', function () {  return view('registerStep2'); });
// Route::get('/register3', function () {  return view('registerStep3'); });
// Route::get('/register4', function () {  return view('registerStep4'); });
// Route::get('/my-account', function () {  return view('myAccount'); });
// Route::get('/my-deals', function () {  return view('deals.myDeals'); });
// Route::get('/deal-info', function () {  return view('deals.dealInfo'); });


Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('/register', [AuthController::class, 'registration'])->name('register');
Route::post('/register/step2', [AuthController::class, 'postStep1'])->name('register.step2');
Route::get('/register/step2', [AuthController::class, 'showStep2'])->name('register.step2.show');
Route::post('/register/step3', [AuthController::class, 'postStep2'])->name('register.step3');
Route::get('/register/step3', [AuthController::class, 'showStep3'])->name('register.step3.show');
Route::post('/register/step4', [AuthController::class, 'postStep3'])->name('register.step4');
Route::get('/register/step4', [AuthController::class, 'showStep4'])->name('register.step4.show');
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Route to show the reset password form
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

// Route to handle the password reset
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password-update');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/show-users', [AdminController::class, 'show_users'])->name('show-user');
    Route::get('/users/{id}/edit', [AdminController::class, 'edit'])->name('users.edit');
    Route::get('/users/{id}/view', [AdminController::class, 'view'])->name('users.view');
    Route::put('/users/{id}', [AdminController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [AdminController::class, 'destroy'])->name('users.destroy');

    Route::get('/deals', [DealsController::class, 'index'])->name('admin.deals.index');
    Route::get('/deals/create', [DealsController::class, 'create'])->name('admin.deals.create');
    Route::post('/deals/store', [DealsController::class, 'store'])->name('admin.deals.store');
    Route::get('/deals/{id}/edit', [DealsController::class, 'edit'])->name('admin.deals.edit');
    Route::put('/deals/{id}', [DealsController::class, 'update'])->name('admin.deals.update');
    Route::delete('/deals/{id}', [DealsController::class, 'destroy'])->name('admin.deals.destroy');

    Route::get('/points/create', [UserPointsController::class, 'create'])->name('admin.points.create');
    Route::post('/points/store', [UserPointsController::class, 'store'])->name('admin.points.store');
    Route::get('/points/index', [UserPointsController::class, 'index'])->name('admin.points.index');
});

Route::middleware(['auth', 'role:sub_admin'])->group(function () {
    Route::get('/owner-page', [OwnerController::class, 'owner_page'])->name('owner_page');
    Route::get('/owner-scan-one', [OwnerController::class, 'owner_scan_one'])->name('owner_scan_one');
    Route::get('/deal-scan-one',[OwnerController::class,'deal_scan_one'])->name('deal_scan_one');
    Route::get('/owner-scan-two', [OwnerController::class, 'owner_scan_two'])->name('owner_scan_two');
    Route::get('/view-otp', [OwnerController::class, 'viewOtp'])->name('view-otp');
    Route::post('/scan-qr', [OwnerController::class, 'scan'])->name('scan-qr');
    Route::post('/owner-scan-one', [OwnerController::class, 'postOwnerPage'])->name('owner-scan-one');
    Route::get('/owner-scan-one', [OwnerController::class, 'owner_scan_one'])->name('owner_scan_one_view');

    Route::post('/owner-scan-two', [OwnerController::class, 'ownerScanPost'])->name('owner_scan_two');
    Route::get('/owner-scan-two', [OwnerController::class, 'owner_scan_two'])->name('owner_scan_two_view');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/my-deals', [DealsController::class, 'dealView'])->name('my-deals');
    Route::get('/deal-info', [DealsController::class, 'dealInfo'])->name('deal-info');
    Route::get('/my-account', [DealsController::class, 'myAccount'])->name('my-account');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/change-password', [ProfileController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('password.update');
    // Route::get('/image/{filename}', function ($filename) {
    //     $path = storage_path('app/private/' . $filename);
    //     if (!File::exists($path)) {
    //         abort(404);
    //     }
    //     return response()->file($path);
    // });
});
