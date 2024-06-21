<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($credentials)) {

            $request->session()->regenerate();

            if (auth()->user()->is_admin === 1) {
                return redirect()->intended('/admin');
            } elseif (auth()->user()->is_admin === 0) {
                return redirect()->intended('/home');
            }
        }

        return back()->with('errors', 'Email atau password yang Anda masukkan salah!');

        // if(Auth::attempt($credentials)){
        //     $request->session()->regenerate();
        //     return redirect()->intended('/home');
        // }

        // return back()->with('loginError', 'LOGIN FAILED!');
    }

    // public function store(Request $request)
    // {
    //     $credentials = ([
    //         'email' => $request->input('email'),
    //         'password' => $request->input('password')
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();
    //         return redirect()->intended('/home');
    //     }

    //     return back()->with('loginError', 'LOGIN FAILED!');
    // }
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
