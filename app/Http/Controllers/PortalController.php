<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function index()
    {
        return view('clientPortal');
    }

    public function ramuanList()
    {
        return view('ramuanList');
    }
}
