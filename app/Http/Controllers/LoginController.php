<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {

        if(session('user')){
         return redirect('/');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = DB::table('users')->where('email', '=', $request->input('email'))->where('password', "=", md5($request->input('password')))->first();
        if ($user) {
            session(['user' => $user]);
            if($user->username === 'admin'){
               return redirect('/admin');
            }
            return redirect('/');
        } else {
            return redirect('login')->with('message-login', 'Invalid account');
        }
    }
}