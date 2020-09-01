<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProsesKelulusanController extends Controller
{
    public function index(Request $request)
    {
        return view('admin/prosesKelulusan');
    }
}
