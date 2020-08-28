<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    public function index(Request $request)
    {
        return view('admin/senaraiPermohonan');
    }

    public function tolak()
    {
        // dd('hello');
        return view('admin/permohonantolak');
    }
    
    public function modalSenaraiPermohonan(Request $request)
    {
        return view('admin/modalSenaraiPermohonan');
    }
}
