<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('auth.register');
    }
    public function save(Request $req){

        if ($req->method() == 'POST') {


        $validate= $req->validate([
            'name'=>['required','string'],
            'email'=>['required','email'],
            'password'=>['required'],
        ]);

        $user=new User();
        $user->insert([
            'name'=>$req->name,
            'email'=>$req->email,
            'created_at'=>date("y-m-d H-m-s"),
            'password'=>Hash::make($req->password),
        ]);
        return redirect ("login");
       }

        return view('auth.register');

    }

}
