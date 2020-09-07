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
        return view('admin/modal_staff');
    }

    public function edit($id)
    {
        return view('admin/modal_Staff');
    }

    public function resetPassword()
    {
        return view('admin/reset_password');
    }
}
