<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ramuan;

class PortalController extends Controller
{
    public function index()
    {
        return view('portal');
    }

    public function ramuanList()
    {
        $tumbuhan = Ramuan::where('ing_category',1)->where('is_delete',0)->get();
        dd($tumbuhan->count());
        // $all = Ramuan::where('is_delete','<>',1)->paginate(10);

        return view('ramuan_list', compact('tumbuhan'));
    }
}
