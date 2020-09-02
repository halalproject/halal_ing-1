<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function profile()
    {
        // dd('hello');

        // $user = Auth::guard('admin')->user();

        return view('admin/profile');
    }

    public function password()
    {
        // $user = Auth::guard('admin')->user();

        return view('admin/password');
    }
}
