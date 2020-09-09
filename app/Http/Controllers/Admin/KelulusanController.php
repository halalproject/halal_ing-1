<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ref_Sumber_Bahan;
use App\Ramuan;

class KelulusanController extends Controller
{
    public function index(Request $request)
    {
        $cat = Ref_Sumber_Bahan::get();
        $kelulusan = Ramuan::where('status',1)->where('is_semak',1);

        if(!empty($request->sijil)){ $kelulusan->where('is_sijil',$request->sijil); }
        if(!empty($request->kategori)){ $kelulusan->where('sumber_bahan_id',$request->kategori); }
        if(!empty($request->carian)){ $kelulusan->where('nama_ramuan','LIKE','%'.$request->carian.'%')->orWhere('nama_saintifik','LIKE','%'.$request->carian.'%'); }

        $kelulusan = $kelulusan->orderBy('create_dt')->paginate(10);

        return view('admin/kelulusan',compact('cat','kelulusan'));
    }

    public function modal_permohonan($id)
    {
        // dd($id);
        $rs = Ramuan::find($id);
        return view('admin/modal_permohonan',compact('rs'));
    }
}
