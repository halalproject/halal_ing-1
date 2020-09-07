<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ramuan;
use App\Ref_Sumber_Bahan;

class PermohonanController extends Controller
{
    public function index(Request $request)
    {
        $cat = Ref_Sumber_Bahan::get();
        $permohonan = Ramuan::where('status',1)->whereNull('tarikh_buka')->paginate(10);

        // dd($permohonan);
        return view('admin/permohonan',compact('cat','permohonan'));
    }

    public function tolak()
    {
        // dd('hello');

        return view('admin/permohonan_tolak');
    }
    
    public function modalSenaraiPermohonan(Request $request)
    {
        // dd('jj');
        return view('admin/modalSenaraiPermohonan');
    }

    public function modalPermohonanDitolak(Request $request)
    {
        // dd('jj');
        return view('admin/modalPermohonanDitolak');
    }
}
