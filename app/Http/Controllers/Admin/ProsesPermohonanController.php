<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProsesPermohonanController extends Controller
{
    public function index(Request $request)
    {
        return view('admin/prosesPermohonan');
    }
}
