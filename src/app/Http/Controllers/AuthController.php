<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(LoginRequest $request){

    if (Auth::attempt($request->only('email','password'))){
        return redirect('/admin');
    }

    return back()->withErrors([
        'email' => 'ログイン情報が登録されていません',
    ]);
    }

    public function register(){
        return view('auth.register');
    }
}
