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

class AuditController extends Controller
{
    public function index(Request $request)
    {
        $cat = Ref_Sumber_Bahan::get();

        $list = Ramuan::where('is_delete',0)->where('is_lulus',1);

        if($request->sijil != ''){ $list->where('is_sijil',$request->sijil); }
        if($request->kategori != ''){ $list->where('ing_category',$request->kategori); }
        if(!empty($request->carian)){ $list->where(function($query) use ($request){
            $query->where('nama_ramuan','LIKE','%'.$request->carian.'%')->orWhere('nama_saintifik','LIKE','%'.$request->carian.'%')->orWhere('nama_pengilang','LIKE','%'.$request->carian.'%')->orWhere('ing_kod','LIKE','%'.$request->carian.'%');
        }); }

        $list = $list->orderBy('create_dt','DESC')->paginate(10);
        // dd($list);
        return view('jais/audit',compact('cat','list'));
    }

    public function detail($id)
    {
        // dd($id);
        $rs = Ramuan::find($id);
        $dokumen = Ramuan_Dokumen::where('ramuan_id',$id)->get();
        return view('jais/modal_detail',compact('rs','dokumen'));
    }

    public function download($file)
    {
        // dd(pathinfo($file)['extension']);
        $path = storage_path().'/app/dokumen_ramuan/'.$file;
		if(file_exists($path)){
            return response()->download($path);
		} else {
			return back();
        }
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
