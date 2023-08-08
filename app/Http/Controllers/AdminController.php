<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index', [
            'users' => DB::select("SELECT *, (SELECT count(*) from vouchers where vouchers.user_id = users.id) as 'count' FROM `users` where username != 'admin'"),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => ['required'],
            'username' => ['required', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required'],
        ]);
      
        DB::table('users')->insert([
            'firstname' => $request->input('firstname'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => md5($request->input('password')),
        ]);

        return redirect('/admin')->with('message', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.edit', [
            'user' => DB::table('users')->where('id', "=", $id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'firstname' => ['required'],
            'username' => ['required', Rule::unique('users', 'username')->ignore($id, 'id')],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($id, 'id')],
        ]);

        DB::table('users')->where('id', "=", $id)->update([
            'firstname' => $request->input('firstname'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
        ]);
        return redirect('/admin')->with('message', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (session('user')->username != "admin") {
            return abort(404);
        }
        DB::table('users')->where('id', "=", $id)->delete();
        return redirect('/admin')->with('message', 'User deleted successfully');

    }
}