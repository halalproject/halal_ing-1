<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function auth(Request $request)
    {
        // dd($request->all());
        $credentials = $request->only('userid', 'password');
        // dd($credentials);
        if(Auth::guard('client')->attempt($credentials)){
            // dd('clients');
            // dd(Auth::guard('client')->user());
            $details = Auth::guard('client')->user();
            $client = $details['is_delete'];
            if($client == 0){
                return response()->json('OK');
            } else {
                return response()->json('ERR');
            }

        } else if(Auth::guard('admin')->attempt($credentials)){
            // dd('admin');
            // dd(Auth::guard('admin')->user());
            $details = Auth::guard('admin')->user();
            $admin = $details['is_delete'];
            // dd($admin);
            if($admin == 0){
                return response()->json('OK');
            } else {
                return response()->json('ERR');
            }

        } else {
            return response()->json('XADA');
        }
    }
}
