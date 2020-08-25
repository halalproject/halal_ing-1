<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SyarikatController extends Controller
{
    public function index()
    {
        
        return view('admin/syarikat');
    }

    public function create()
    {
       
        return view('admin/modalsyarikat');
    }
}
