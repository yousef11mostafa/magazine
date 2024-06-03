<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Logincontroller extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }
    public function save(Request $req){

        $validate= $req->validate([
            'email'=>['required','email'],
            'password'=>['required'],
        ]);

        if (Auth::attempt($validate)) {
            $req->session()->regenerate();
            return redirect()->intended('admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');


    }
}
