<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DealsController;
use App\Http\Controllers\ForgotPasswordController;

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
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('/register', [AuthController::class, 'registration'])->name('register');
Route::post('/register/step2', [AuthController::class, 'postStep1'])->name('register.step2');
Route::get('/register/step2', [AuthController::class, 'showStep2'])->name('register.step2.show');
Route::post('/register/step3', [AuthController::class, 'postStep2'])->name('register.step3');
Route::get('/register/step3', [AuthController::class, 'showStep3'])->name('register.step3.show');
Route::post('/register/step4', [AuthController::class, 'postStep3'])->name('register.step4');
Route::get('/register/step4', [AuthController::class, 'showStep4'])->name('register.step4.show');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');


Route::get('/my-deals',[DealsController::class, 'dealView'])->name('my-deals');
Route::get('/deal-info',[DealsController::class,'dealInfo'])->name('deal-info');
Route::get('/my-account',[DealsController::class,'myAccount'])->name('my-account');


