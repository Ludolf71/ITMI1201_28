<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin() {
        return view('content.login');
    }

    public function checkLogin(Request $request) {
        $credentials = $request->validate([
            //required เป็นค่าว่างไหม รูปแบบเป็น email
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        //ค่าที่อยู่ใน $credentials มีหรือไม่
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/content');
        }
        return back()->withErrors([
            'email' => 'Creadentials do not match our records',
        ]);
    }
}
