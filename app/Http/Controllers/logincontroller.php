<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class logincontroller extends Controller
{
    public function index(){
       return view("operator/login"); 
    }

    public function login(Request $request)
    {
        Session::flash('email',$request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'email wajib diisi',
            'password.required' => 'password wajib diisi'
        ]);

        $infologin =[
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if(Auth::attempt($infologin)){
            return redirect('operator')->with('berhasil login')->with('success','berhasil login');
        }else{
            return view('operator.login')->with('email atau password tidak valid');

        }
    }

    function logout(){
        Auth::logout();
        return redirect('/')->with('success','Berhasil Logout');
    }
}
