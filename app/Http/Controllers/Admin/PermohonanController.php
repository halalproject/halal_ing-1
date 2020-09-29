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
        $permohonan = Ramuan::where('status',1)->whereNull('tarikh_buka');

        if($request->sijil != ''){ $permohonan->where('is_sijil',$request->sijil); }
        if($request->kategori != ''){ $permohonan->where('sumber_bahan_id',$request->kategori); }
        if(!empty($request->carian)){ $permohonan->where(function($query) use ($request){
            $query->where('nama_ramuan','LIKE','%'.$request->carian.'%')->orWhere('nama_saintifik','LIKE','%'.$request->carian.'%')->orWhere('nama_pengilang','LIKE','%'.$request->carian.'%')->orWhere('ing_kod','LIKE','%'.$request->carian.'%');
        }); }

        $permohonan = $permohonan->orderBy('create_dt')->paginate(10);
        // dd($permohonan);
        return view('admin/permohonan',compact('cat','permohonan'));
    }

    public function tolak(Request $request)
    {
        $cat = Ref_Sumber_Bahan::get();
        $permohonan = Ramuan::where('status',6);

        if($request->sijil != ''){ $permohonan->where('is_sijil',$request->sijil); }
        if($request->kategori != ''){ $permohonan->where('sumber_bahan_id',$request->kategori); }
        if(!empty($request->carian)){ $permohonan->where(function($query) use ($request){
            $query->where('nama_ramuan','LIKE','%'.$request->carian.'%')->orWhere('nama_saintifik','LIKE','%'.$request->carian.'%')->orWhere('ing_kod','LIKE','%'.$request->carian.'%');
        }); }

        $permohonan = $permohonan->orderBy('create_dt')->paginate(10);

        return view('admin/permohonan_tolak',compact('cat','permohonan'));
    }
    
    public function modal_permohonan($id)
    {
        // dd($id);
        Ramuan::find($id)->update(['tarikh_buka'=>now()]);

        $rs = Ramuan::find($id);
        return view('admin/modal_permohonan',compact('rs'));
    }

    public function detail($id)
    {
        $rs = Ramuan::find($id);
        return view('admin/modal_detail',compact('rs'));
    }
}
