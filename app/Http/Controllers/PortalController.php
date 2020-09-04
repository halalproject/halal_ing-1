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
        $tumbuhan = Ramuan::where('ing_category',1)->where('is_delete',0)->where('is_lulus',1)->paginate(10);
        $haiwan = Ramuan::where('ing_category',2)->where('is_delete',0)->where('is_lulus',1)->paginate(10);
        $kimia = Ramuan::where('ing_category',3)->where('is_delete',0)->paginate(10);
        // $semula_jadi = Ramuan::where('ing_category',4)->where('is_delete',0)->where('is_lulus',1)->get();
        // $other = Ramuan::where('ing_category',5)->where('is_delete',0)->where('is_lulus',1)->get();
        // $bahan = Ramuan::where('is_delete',0)->where('is_lulus',1)->get();
        // dd($tumbuhan->count());
        // $all = Ramuan::where('is_delete','<>',1)->where('is_lulus',1)->paginate(10);
        // dd($all);

        return view('ramuan_list', compact('tumbuhan','haiwan','kimia'));
    }
}
