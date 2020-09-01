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

    public function view($id)
    {
        return view('admin/modalSyarikat');
    }

    public function ramuan($id)
    {
        // dd($id);
        return view('admin/ramuan');
    }

    public function modalTindakan(Request $request)
    {
        return view('admin/modalTindakan');
    }
}
