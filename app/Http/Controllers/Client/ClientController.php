<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function profile()
    {
        // dd('hello');

        $user = Auth::guard('client')->user();

        return view('client/profile',compact('user'));
    }

    public function password()
    {
        return view('client/password');
    }
}
