<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function profile()
    {
        // dd('hello');
        return view('client/profile');
    }

    public function password()
    {
        return view('client/password');
    }
}
