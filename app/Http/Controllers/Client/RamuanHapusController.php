<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RamuanHapusController extends Controller
{
    public function index(){
        return view('client/ramuanhapus');
    }

    public function hapus()
    {
        return view('client/ramuanhapus');
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
