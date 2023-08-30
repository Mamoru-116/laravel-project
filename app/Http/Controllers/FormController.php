<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormModel;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash; 
use Illuminate\Validation\Rule;

class FormController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'alpha', 'max:255', 'unique:form_model', 'regex:/^[^\s]+$/'],
            'email' => ['required', 'email', 'max:255', 'unique:form_model'],
            'password' => ['required', 'string', 'min:8', 'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'],
            'phone' => ['required', 'numeric', 'digits_between:10,11'],
            'dob' => ['required', 'date']
        ], [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.alpha' => 'The name must be only contain character.',
            'name.max' => 'The name may not be greater than :max characters.',
            'name.unique' => 'The name has already been taken.',
            'name.regex' => 'The name cannot contain spaces.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email may not be greater than :max characters.',
            'email.unique' => 'The email has already been taken.',
            'password.required' => 'The password field is required.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least :min characters.',
            'password.regex' => nl2br('The password must contain:
                                - at least one special symbol
                                - at least one uppercase letter
                                - at least one number'),
            'phone.required' => 'The phone field is required.',
            'phone.numeric' => 'The phone must be number.',
            'phone.digits_between' => 'The phone number must have at least 10 or 11 digits.',
            'dob.required' => 'The date of birth field is required.'    ,
            'dob.date' => 'The date of birth must be a valid date.',
        ]);

        // Create a new user instance
        $user = new FormModel();

        // Assign validated data to the user instance
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->phone = $validatedData['phone'];
        $user->dob = $validatedData['dob'];

        // Save the user to the database
        $user->save();

        // Redirect to the login page with a success message
        return redirect()->route('login')->with('success', 'Register successfully');
    }

    public function login()                         
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            return redirect('/home')->with('success', 'Login Success');
        }

        return back()->with('error', 'Incorrect email or password');
    }
}
