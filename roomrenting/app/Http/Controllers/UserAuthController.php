<?php

// app/Http/Controllers/UserAuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function register()
    {
        return view('userauth.register');
    }

    public function registerSave(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('user')->login($user);

        return redirect()->route('user.index');
    }
    public function showLoginForm()
    {
        return view('userauth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('user')->attempt($credentials)) {
            return redirect()->route('user.index');
        }

        return redirect()->route('user.login')->withErrors(['email' => 'Invalid credentials.']);
    }


    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
        return redirect()->route('user.login');
    }
}
