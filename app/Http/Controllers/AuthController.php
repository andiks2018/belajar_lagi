<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //Membuat login
    function index()
    {
        return view('auth.login');
    }

    function doLogin(Request $request){
        $data = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        //ketika datanya ada maka akan sesion dandialihkan ke halaman dashboard
        if(Auth::attempt($data)){
            $request->session()->regenarate();
            return redirect('/dashboard');
        }
        //jika tidak ada akan kehalaman itu kembali
        return back()->with('loginError', 'Email atau password salah');
    }
}
