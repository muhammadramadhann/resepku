<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store_register(Request $request)
    {
        $user = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|min:5',
        ]);

        $user['password'] = Hash::make($user['password']);
        $user = User::create($user);

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME)->with('success', 'Selamat Datang di Resepku 👋');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function store_login(Request $request)
    {
        // remember me check
        $remember_me = $request->remember ? true : false;

        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials, $remember_me)) {
            return redirect(RouteServiceProvider::HOME)->with('success', 'Selamat Datang Kembali ' . Auth::user()->name . '👋');;
        }

        return back()->with('error', 'Login Gagal! akun tidak ditemukan');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->flush();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect(RouteServiceProvider::HOME);
    }
}
