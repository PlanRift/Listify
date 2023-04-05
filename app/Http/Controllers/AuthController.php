<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('list');
        }

        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $account = $request->only('email', 'password');
        if (Auth::attempt($account)) {
            return redirect('list');
        } else {
            return redirect('login')->with('error_message', 'wrong email or password');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }

    public function registration()
    {
        if (Auth::check()) {
            return redirect('list');
        }
        return view('auth.register');
    }

    public function register(Request $request)
    {



        $request->validate([
            'name'      => 'required|min:3|max:10',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:4|confirmed'
        ]);

        User::create([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'password'  => Hash::make($request->input('password'))
        ]);

        return redirect('login');
    }
}
