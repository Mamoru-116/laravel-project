<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormModel;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash; 

class FormController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required',
        //     'phone' => 'required',
        //     'dob' => 'required|date',
        // ]);
    
        // // Hash the password
        // $hashedPassword = Hash::make($validatedData['password']);
    
        // // Save the user data with the hashed password
        // FormModel::create([
        //     'name' => $validatedData['name'],
        //     'email' => $validatedData['email'],
        //     'password' => $hashedPassword,
        //     'phone' => $validatedData['phone'],
        //     'dob' => $validatedData['dob'],
        // ]);

        $user = new FormModel();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->dob = $request->dob;

        $user->save();

        return redirect()->route('login')->with('success', 'Register successfully');
    }

    public function login()
    {
        return view('login');
    }

    // public function loginPost(Request $request)
    // {
    //     $credentials = [
    //         'email' => $request->email,
    //         'password' => $request->password,
    //     ];


    //     if (Auth::attempt($credentials)) {
    //         return redirect('/home')->with('success', 'Login Success');
    //     }

    //     return back()->with('error', 'Wrong username or password');
    // }

    // public function loginPost(Request $request)
    // {
    //     $user = FormModel::where('email', $request->input('email'))->get();

    //     if (Hash::make($user[0]->password)==$request->input('password')) {
    //         $request->session()->put('user', $user[0]->name);
    //         return redirect()->route('home')->with('success', 'Login successfully');
    //     }

    //     return back()->with('error', 'Wrong username or password');
    // }
}
