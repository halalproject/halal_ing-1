<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    public function index()
    {
        
        return view('admin/audit');
    }

    public function modalAudit(Request $request)
    {
        return view('admin/modalAudit');
    }
}
