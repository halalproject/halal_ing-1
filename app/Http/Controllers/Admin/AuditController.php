<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ramuan;
use App\Ref_Sumber_Bahan;

class AuditController extends Controller
{
    public function index(Request $request)
    {
        $cat = Ref_Sumber_Bahan::get();

        $list = Ramuan::where('is_delete',0)->where('is_lulus',1);

        if($request->sijil != ''){ $list->where('is_sijil',$request->sijil); }
        if($request->kategori != ''){ $list->where('ing_category',$request->kategori); }
        if(!empty($request->carian)){ $list->where(function($query) use ($request){
            $query->where('nama_ramuan','LIKE','%'.$request->carian.'%')->orWhere('nama_saintifik','LIKE','%'.$request->carian.'%');
        }); }
        
        $list = $list->orderBy('create_dt','DESC')->paginate(10);
        // dd($list);
        return view('admin/audit',compact('cat','list'));
    }

    public function detail($id)
    {
        // dd($id);
        $rs = Ramuan::find($id);
        return view('admin/modal_detail',compact('rs'));
    }
}
