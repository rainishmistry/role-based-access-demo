<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'phone' => 'required|integer',
            // 'address' => 'required|string|max:255',
            // 'city' => 'required|string|max:255',
            // 'state' => 'required|string|max:255',
            // 'zip' => 'required|string|max:255',
            // 'country' => 'required|string|max:255',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'status' => 1,
            'phone' => $request->phone,
            // 'address' => $request->address,
            // 'city' => $request->city,
            // 'state' => $request->state,
            // 'zip' => $request->zip,
            // 'country' => $request->country,
        ]);

        Auth::login($user);

        return redirect()->route('login')->with('success', 'Registration successful. Please login to continue.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // $user = User::where('email', $request->email)->first();
        // if (!$user) {
        //     return redirect()->route('login')->with('error', 'Invalid email or password.');
        // }

        // if (!Hash::check($request->password, $user->password)) {
        //     return redirect()->route('login')->with('error', 'Invalid email or password.');
        // }

        // if (!$user->isActive()) {
        //     return redirect()->route('login')->with('error', 'Your account is not active. Please contact the administrator.');
        // }

        // Auth::login($user);
        // if($user->isAdmin()){
        //     return redirect()->route('admin.dashboard')->with('success', 'Login successful. Welcome back, ' . $user->name . '!');
        // }
        // return redirect()->route('user.home')->with('success', 'Login successful. Welcome back, ' . $user->name . '!');


        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            // Check status
            if (auth()->user()->status == 0) {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Your account is inactive. Please contact admin.');
            }

            // Role-based redirect
            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Welcome Admin!');
            } else {
                return redirect()->route('user.home')->with('success', 'Login successful!');
            }
        }

        return redirect()->back()->with('error', 'Invalid email or password!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout successful. Thank you for using our application.');
    }
}
