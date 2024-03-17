<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.beranda.index', [
            'user' => auth()->user()
        ]);
    }

    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        // return $credentials;

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/mobil');
        }

        return back()->with('loginError', 'Login gagal!');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function registrasi()
    {
        return view('registrasi');
    }

    public function store(Request $request)
    {
        $validated =  $request->validate([
            'username' => 'required',
            'password' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'sim' => 'required',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);


        return redirect('/');
    }
}
