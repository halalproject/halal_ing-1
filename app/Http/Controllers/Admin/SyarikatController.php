<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use App\Ramuan;
use App\Ref_Sumber_Bahan;

class SyarikatController extends Controller
{
    public function index()
    {
        $client = Client::where('status',0)->where('is_delete',0)->paginate(10);
        return view('admin/syarikat',compact('client'));
    }

    public function view($id)
    {
        // dd($id);

        $client = Client::find($id);

        return view('admin/modal_syarikat',compact('client'));
    }

    public function ramuan(Request $request,$id)
    {
        // dd($id);
        $syarikat = Client::where('userid',$id)->first();

        $cat = Ref_Sumber_Bahan::get();

        $ramuan = Ramuan::where('create_by',$id)->where('is_lulus',1)->where('is_delete',0);

        if(!empty($request->sijil)){ $ramuan->where('is_sijil',$request->sijil); }
        if(!empty($request->kategori)){ $ramuan->where('sumber_bahan_id',$request->kategori); }
        if(!empty($request->carian)){ $ramuan->where('nama_ramuan','LIKE','%'.$request->carian.'%')->orWhere('nama_saintifik','LIKE','%'.$request->carian.'%'); }
        
        $ramuan = $ramuan->orderBy('create_dt','DESC')->paginate(10);
        return view('admin/ramuan',compact('syarikat','cat','ramuan'));
    }

    public function detail($id)
    {
        // dd($id);
        $rs = Ramuan::find($id);
        return view('admin/modal_detail',compact('rs'));
    }
}
