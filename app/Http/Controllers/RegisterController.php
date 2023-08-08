<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        if(session('user')){
            return redirect('/');
            }
        return view('register');
    }

    public function create(Request $request)
    {
        $request->validate([
            'firstname' => ['required'],
            'username' => ['required', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required'],
        ]);

        $user_id = DB::table('users')->insertGetId([
            'firstname' => $request->input('firstname'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => md5($request->input('password')),
        ]);

        $code = Str::random(10);
        DB::table('vouchers')->insert(
            [
                'user_id' => $user_id,
                'code' => $code,
            ]
        );
        return redirect('/login')->with('message-login', 'Account created successfully. Voucher - ' . $code);

    }
}