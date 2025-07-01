<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Show login form.
     */
    public function login(Request $request)
    {
        return view('login');
    }

    /**
     * Handle login submission.
     */
    public function loginIndex(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard'); // redirect to your main page
        } else if (User::where('email', $request->email)->exists()) {
            // If the user exists but the password is incorrect, return an error
            return back()->withErrors([
                'password' => 'Password is incorrect',
            ])->onlyInput('password');
        } else {
            // If email or password is empty, return an error
            return back()->withErrors([
                'email' => 'User does not exist',
            ])->onlyInput('email');
        }
    }

    /**
     * Show registration form.
     */
    public function register(Request $request)
    {
        return view('register');
    }

    /**
     * Handle registration submission.
     */
    public function registerIndex(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect()->route('dashboard')->with('success', 'Registration successful!');
    }

    /**
     * Logout logic
     */
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
