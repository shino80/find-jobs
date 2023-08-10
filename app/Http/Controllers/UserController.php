<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{
    //show register form 

    public function create()
    {
        return view('users.register');
    }
    public function store(Request $request)
    {
        // Validate the form fields
        $formField = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash the password
        $formField['password'] = bcrypt($formField['password']);

        // Store the validated form data into the 'users' table
        $user = User::create($formField);

        // Log in the newly created user
        auth()->login($user);

        // Redirect to the homepage with a success message
        return redirect('/')->with('message', 'ユーザーが正常に作成されました!');
    }
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'ログアウトしました!');
    }
    // LOGIN
    public function login(Request $request)
    {
        return view('users.login');
    }

    // AUTH

    public function auth(Request $request)
    {
        // Validate the form fields
        $formField = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
    
        // Attempt to log in the user
        if (auth()->attempt($formField)) {
            // If authentication is successful, regenerate the session ID for security
            $request->session()->regenerate();
    
            // Redirect the user to the homepage with a success message
            return redirect('/')->with('message', 'ログインしました!');
        }
    
        // If authentication fails, redirect back with an error message
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
    
}
