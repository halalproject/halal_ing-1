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

<<<<<<< HEAD
    public function tolak()
    {
        // dd('hello');
        return view('admin/permohonantolak');
=======
    public function modalSenaraiPermohonan(Request $request)
    {
        return view('admin/modalSenaraiPermohonan');
>>>>>>> 1d9348f506989747d5c58b61106220ac3e0fc661
    }
}
