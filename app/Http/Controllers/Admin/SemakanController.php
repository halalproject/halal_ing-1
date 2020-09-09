<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ref_Sumber_Bahan;
use App\Ramuan;

class SemakanController extends Controller
{
    public function index(Request $request)
    {
        $cat = Ref_Sumber_Bahan::get();
        $semakan = Ramuan::where('status',1)->whereNotNull('tarikh_buka');

        if(!empty($request->sijil)){ $semakan->where('is_sijil',$request->sijil); }
        if(!empty($request->kategori)){ $semakan->where('sumber_bahan_id',$request->kategori); }
        if(!empty($request->carian)){ $semakan->where('nama_ramuan','LIKE','%'.$request->carian.'%')->orWhere('nama_saintifik','LIKE','%'.$request->carian.'%'); }

        $semakan = $semakan->orderBy('create_dt')->paginate(10);

        return view('admin/semakan',compact('cat','semakan'));
    }

    public function modal_permohonan($id)
    {
        // dd($id);
        $rs = Ramuan::find($id);
        return view('admin/modal_permohonan',compact('rs'));
    }
}
