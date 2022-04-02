<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    function login(){
        return view('admin.auth.login');
    }
    function loginProcess(Request $request){
        // User::whereRaw('email == '.$request->email.' && password == '.$request->password);

        // // dd($request->email);
        // return back();
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {-
            $request->session()->regenerate();

            return redirect()->intended('/admin');
        }

        return back()->with('error', 'Login gagal! Silahkan perbaiki data anda');
    }

    function dashboard(){
        echo 'berhasil login';
    }
}
