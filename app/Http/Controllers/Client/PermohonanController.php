<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    public function proses(){
        return view('client/permohonan');
    }

    public function tolak()
    {
        return view('client/permohonan');
    }

    public function edit($id)
    {
        return view('client/modal',compact('id'));
    }

    public function view($id)
    {
        return view('client/view',compact('id'));
    }

    public function delete($id)
    {
        
    }
}
