<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    protected function create(Request $request)
    {
        $data = $request->all();
        $user =  User::create([
            'namapemain' => $data['namapemain'],
            'email' => $data['email'],
            'nohp' => $data['nohp'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect('/login')->with('success', 'Registration successfull! Please login!');
    }
}
