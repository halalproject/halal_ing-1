<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ramuan;
use App\Ref_Sumber_Bahan;

class RamuanController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::guard('client')->user()->userid;
        // dd($user);
        // dd($request->all());
        $ramuan = Ramuan::where('create_by',$user)->where('status',3)->where('is_delete',0);

        if(!empty($request->sijil)){ $ramuan->where('is_sijil',$request->sijil); }
        if(!empty($request->kategori)){ $ramuan->where('sumber_bahan_id',$request->kategori); }
        if(!empty($request->carian)){ $ramuan->where('nama_ramuan','LIKE','%'.$request->carian.'%')->orWhere('nama_saintifik','LIKE','%'.$request->carian.'%'); }
        
        $ramuan = $ramuan->orderBy('create_dt','DESC')->paginate(10);
        $cat = Ref_Sumber_Bahan::get();
        
        return view('client/ramuan',compact('cat','ramuan'));
    }

    public function hapus(Request $request)
    {
        $user = Auth::guard('client')->user()->userid;
        // dd($user);
        // dd($request->all());
        $ramuan = Ramuan::where('create_by',$user)->where('is_delete',1);

        if(!empty($request->sijil)){ $ramuan->where('is_sijil',$request->sijil); }
        if(!empty($request->kategori)){ $ramuan->where('sumber_bahan_id',$request->kategori); }
        if(!empty($request->carian)){ $ramuan->where('nama_ramuan','LIKE','%'.$request->carian.'%')->orWhere('nama_saintifik','LIKE','%'.$request->carian.'%'); }
        
        $ramuan = $ramuan->orderBy('delete_dt','DESC')->paginate(10);
        $cat = Ref_Sumber_Bahan::get();

        return view('client/hapus',compact('cat','ramuan'));
    }

    public function edit($id)
    {
        return view('client/modal',compact('id'));
    }

    public function view($id)
    {
        return view('client/view');
    }

    public function delete($id)
    {
        
    }
}
