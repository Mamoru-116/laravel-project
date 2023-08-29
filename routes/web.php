<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/login', 'login');
Route::view('/', 'register');
Route::view('/register', 'register');
Route::view('/home', 'home');

// Route::get('/register', [FormController::class, 'create'])->name('form.create');
Route::post('/register', [FormController::class, 'store'])->name('form.store');

Route::get('/login', [FormController::class, 'login'])->name('login');
Route::post('/login', [FormController::class, 'loginPost'])->name('login');
