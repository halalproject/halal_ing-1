<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        return view('admin/staff');
    }

    public function create()
    {
        return view('admin/modalStaff');
    }

    public function edit()
    {
        return view('admin/modalStaff');
    }

    public function resetPassword()
    {
        return view('admin/modalResetPassword');
    }
}
