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
        $ramuan = Ramuan::where('status',3)->where('is_delete',0);

        if($request->sijil != ''){ $ramuan->where('is_sijil',$request->sijil); }
        if($request->kategori != ''){ $ramuan->where('sumber_bahan_id',$request->kategori); }
        if(!empty($request->carian)){ $ramuan->where('nama_ramuan','LIKE','%'.$request->carian.'%')->orWhere('nama_saintifik','LIKE','%'.$request->carian.'%'); }

        if(!empty($request->days)){
            if($request->days == 90){
                $ramuan->whereBetween('tarikh_tamat_sijil',[now()->addDays(30),now()->addDays(90)]);
            } else if($request->days == 30){
                $ramuan->whereBetween('tarikh_tamat_sijil',[now()->addDays(7),now()->addDays(30)]);
            } else {
                $ramuan->where('tarikh_tamat_sijil','<=',now()->addDays(7));
            }
        }
        
        $ramuan = $ramuan->where('create_by',$user)->where('is_delete', 0)->orderBy('create_dt','DESC')->paginate(10);
        $cat = Ref_Sumber_Bahan::get();
        
        return view('client/ramuan',compact('cat','ramuan'));
    }

    public function hapus(Request $request)
    {
        $user = Auth::guard('client')->user()->userid;
        // dd($user);
        // dd($request->all());
        $ramuan = Ramuan::where('is_delete',1);

        if($request->sijil != ''){ $ramuan->where('is_sijil',$request->sijil); }
        if($request->kategori != ''){ $ramuan->where('sumber_bahan_id',$request->kategori); }
        if(!empty($request->carian)){ $ramuan->where('nama_ramuan','LIKE','%'.$request->carian.'%')->orWhere('nama_saintifik','LIKE','%'.$request->carian.'%'); }
        
        $ramuan = $ramuan->where('create_by',$user)->orderBy('delete_dt','DESC')->paginate(10);
        $cat = Ref_Sumber_Bahan::get();

        return view('client/hapus',compact('cat','ramuan'));
    }

    public function edit($id)
    {
        return view('client/modal',compact('id'));
    }

    public function view($id)
    {
        // dd($id);

        $rs = Ramuan::find($id);

        return view('client/view',compact('rs'));
    }

    public function delete($id)
    {
        $user = Auth::guard('client')->user()->userid;
        // dd($id);
        $cal = Ramuan::find($id)->update(['is_delete'=>1,'delete_dt'=>now(),'delete_by'=>$user]);

        if($cal){
            return response()->json('OK');
        } else {
            return response()->json('ERR');
        }
    }
}
