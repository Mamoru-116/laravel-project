<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::view('/', 'register');
Route::view('/login', 'login');
Route::view('/register', 'register');
Route::view('/home', 'home');

Route::post('/register', [FormController::class, 'store'])->name('form.store');
Route::post('/login', [FormController::class, 'loginPost'])->name('login');