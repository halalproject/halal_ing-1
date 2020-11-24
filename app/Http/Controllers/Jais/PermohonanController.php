<?php

namespace App\Http\Controllers\Jais;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ramuan;
use App\Ramuan_Dokumen;
use App\Ramuan_Komen;
use App\Ref_Sumber_Bahan;
use App\Ref_Surat;

class PermohonanController extends Controller
{
    public function index(Request $request)
    {
        $cat = Ref_Sumber_Bahan::get();
        $permohonan = Ramuan::where('status',1)->whereNull('tarikh_buka');

        if($request->sijil != ''){ $permohonan->where('is_sijil',$request->sijil); }
        if($request->kategori != ''){ $permohonan->where('ing_category',$request->kategori); }
        if(!empty($request->carian)){ $permohonan->where(function($query) use ($request){
            $query->where('nama_ramuan','LIKE','%'.$request->carian.'%')->orWhere('nama_saintifik','LIKE','%'.$request->carian.'%')->orWhere('nama_pengilang','LIKE','%'.$request->carian.'%')->orWhere('ing_kod','LIKE','%'.$request->carian.'%');
        }); }

        $permohonan = $permohonan->orderBy('create_dt')->paginate(10);
        // dd($permohonan);
        return view('jais/permohonan',compact('cat','permohonan'));
    }

    public function tolak(Request $request)
    {
        $cat = Ref_Sumber_Bahan::get();
        $permohonan = Ramuan::where('status',6);

        if($request->sijil != ''){ $permohonan->where('is_sijil',$request->sijil); }
        if($request->kategori != ''){ $permohonan->where('ing_category',$request->kategori); }
        if(!empty($request->carian)){ $permohonan->where(function($query) use ($request){
            $query->where('nama_ramuan','LIKE','%'.$request->carian.'%')->orWhere('nama_saintifik','LIKE','%'.$request->carian.'%')->orWhere('ing_kod','LIKE','%'.$request->carian.'%');
        }); }

        $permohonan = $permohonan->orderBy('create_dt')->paginate(10);

        return view('jais/permohonan_tolak',compact('cat','permohonan'));
    }
    
    public function modal_permohonan($id)
    {
        // dd($id);
        Ramuan::find($id)->update(['tarikh_buka'=>now()]);

        $rs = Ramuan::find($id);
        $upload = Ramuan_Dokumen::where('ramuan_id',$id)->get();
        // dd($upload);
        return view('jais/modal_permohonan',compact('rs','upload'));
    }

    public function detail($id)
    {
        $rs = Ramuan::find($id);
        $upload = Ramuan_Dokumen::where('ramuan_id',$id)->get();
        // dd($upload);
        return view('jais/modal_detail',compact('rs','upload'));
    }
    
    public function surat(Request $request)
    {
        // dd($request->all());

        $ramuan = Ramuan::find($request->ids);
        // dd($ramuan);

        $syarikat = Client::where('userid',$ramuan->create_by)->first();
        // dd($syarikat);

        $surat = Ref_Surat::where('type',$request->type)->where('kod',$request->kod)->first();
        // dd($surat);

        $komen = Ramuan_Komen::where('ramuan_id',$request->ids)->first();
        // dd($komen);

        return view('surat',compact('ramuan','syarikat','surat','komen'));
    }
}
