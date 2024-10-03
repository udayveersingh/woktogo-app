<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {  return view('login'); });
Route::get('/login', function () {  return view('loginStep2'); });
Route::get('/login2', function () {  return view('loginStep3'); });
Route::get('/register', function () {  return view('register'); });
Route::get('/register2', function () {  return view('registerStep2'); });
Route::get('/register3', function () {  return view('registerStep3'); });
Route::get('/register4', function () {  return view('registerStep4'); });
