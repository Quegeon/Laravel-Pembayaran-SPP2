<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index () {
        return view('login');
    }

    public function postlogin (Request $request) {
        $request->except(['_token']);
    
        if (Auth::attempt($request->only('username','password'))) {
            return redirect('/dashboard')->with('status',[
                'title' => 'Successfuly Logged!',
                'type' => 'success'
            ]);
        } else {
            return redirect('/')->with('status',[
                'title' => 'Failed to Login',
                'type' => 'danger'
            ]);
        }
    }

    public function logout () {
        Auth::logout();
        return redirect('/');
    }
}
