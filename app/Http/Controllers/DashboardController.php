<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin,client']);
    }

    public function client()
    {
        return view('client/dashboard');
    }

    public function admin()
    {
        return view('admin/dashboard');
    }
}
