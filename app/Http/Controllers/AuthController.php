<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login() {
        return view('login');
    }

    public function sign(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if($validator->fails()) {
            return redirect('login')->with(['message' => $validator->errors()]);
        }

        if(Auth::attempt($request->except('_token'))) {
            return redirect('/');
        }

        return redirect('login')->with(['message' => 'Login gagal!']);
    }

    public function logout() {
        Auth::logout();

        return redirect(route('login'));
    }
}
