<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!session('user')){
            return redirect('/login');
        }
        return view('vouchers.home', [
            'vouchers' => DB::table('vouchers')->where('user_id', '=', session('user')->id)->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $count = DB::table('vouchers')->where('user_id', '=', session('user')->id)->count();
        if ($count >= 10) {
            return redirect('/')->with('voucher-error', 'Bawal na sampo lang pwede');
        }

        DB::table('vouchers')->insert(
            [
                'user_id' => session('user')->id,
                'code' => Str::random(10),
            ]
        );

        return redirect('/');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {



        return view('vouchers.view', [
            'voucher' => DB::table('vouchers')->where('user_id', '=', session('user')->id)->where('id', '=', $id)->first(),
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('vouchers')->where('user_id', '=', session('user')->id)->where('id', '=', $id)->delete();
        return redirect('/')->with('voucher-error', 'Successfully deleted');
    }

    public function logout(){
        session()->flash('user');
       return redirect('/login');
    }
}