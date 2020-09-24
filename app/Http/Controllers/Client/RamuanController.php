<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ramuan;
use App\Ref_Sumber_Bahan;
use App\Ramuan_Dokumen;

class RamuanController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::guard('client')->user()->userid;
        // dd($user);
        // dd($request->all());
        $ramuan = Ramuan::where('create_by',$user)->where('status',3)->where('is_delete',0);
        // dd($ramuan);
        if($request->sijil != ''){ $ramuan->where('is_sijil',$request->sijil); }
        if($request->kategori != ''){ $ramuan->where('sumber_bahan_id',$request->kategori); }
        if(!empty($request->carian)){ $ramuan->where(function($query) use($request){
            $query->where('nama_ramuan','LIKE','%'.$request->carian.'%')->orWhere('nama_saintifik','LIKE','%'.$request->carian.'%')->orWhere('nama_pengilang','LIKE','%'.$request->carian.'%')->orWhere('ing_kod','LIKE','%'.$request->carian.'%');
        }); }

        if(!empty($request->days)){
            if($request->days == 90){
                $ramuan->whereBetween('tarikh_tamat_sijil',[now()->addDays(30),now()->addDays(90)]);
            } else if($request->days == 30){
                $ramuan->whereBetween('tarikh_tamat_sijil',[now()->addDays(7),now()->addDays(30)]);
            } else {
                $ramuan->where('tarikh_tamat_sijil','<=',now()->addDays(7));
            }
        }
        
        $ramuan = $ramuan->orderBy('create_dt','DESC')->paginate(10);
        $cat = Ref_Sumber_Bahan::get();
        // dd($ramuan);
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
        $upload = Ramuan_Dokumen::where('ramuan_id',$id)->where('ref_dokumen_id', 1)->get();

        return view('client/view',compact('rs', 'upload'));
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

    public function delete_comment($id)
    {
        // dd($id);

        $rs = Ramuan::find($id);

        return view('client/modalDeleteRamuan',compact('rs'));
    }

    public function reason(Request $request)
    {
        $user = Auth::guard('client')->user()->userid;
        
        if(!empty($request->id)) {
            $data = array(
                'delete_comment'=>$request->catatan_text,
                'is_delete' => 1,
                'delete_dt' => now(),
                'delete_by' => $user,
            );

            $permohonan = Ramuan::where('id',$request->id)->update($data);
        }

            if($permohonan){
                return response()->json('OK');
            } else {
                return response()->json('ERR');
            }
    }

    public function restore($id)
    {
        $user = Auth::guard('client')->user()->userid;
        // dd($id);
        $cal = Ramuan::find($id)->update(['is_delete'=>0,'delete_dt'=>now(),'delete_by'=>$user]);

        if($cal){
            return response()->json('OK');
        } else {
            return response()->json('ERR');
        }
    }

    public function showEditTarikh($id)
    {
        $rs = Ramuan::find($id);
        $upload = Ramuan_Dokumen::where('ramuan_id',$id)->where('ref_dokumen_id', 1)->get();
        // $upload = Ramuan_Dokumen::where('ramuan_id',$id)->get();

        // dd($upload);

        return view('client/modalTarikhTamatSijil', compact('rs', 'upload'));
    }

    public function updateSijil(request $request)
    {
        $user = Auth::guard('client')->user()->id;
        
        if(!empty($request->sijil_halal)){
            $file = $request->sijil_halal->getClientOriginalName();
            $type = pathinfo($file)['extension'];
            $path = $request->sijil_halal->storeAs('dokumen_ramuan', $file); 

            $sijil = Ramuan_Dokumen::where('id', $request->id)->update(['file_name'=>$file, 'file_type'=>$type]);
        }

        $sijil = Ramuan::where('id', $request->ramuan_id)->update(['tarikh_tamat_sijil'=>$request->tarikh_tamat_sijil,'update_dt'=>now(),'update_by'=>$user]);

        if($sijil){
            return response()->json('OK');
        } else {
            return response()->json('ERR');
        }
    }

    public function downloadDocument($file)
	{
		// dd(pathinfo($file)['extension']);
        $path = storage_path().'/app/dokumen_ramuan/'.$file;
        $setFileType = pathinfo($file)['extension'];
		if(file_exists($path)){
            if($setFileType == "jpg" || $setFileType == "jpeg" || $setFileType == "png" ) {
                return response()->make(file_get_contents($path), 200, [
                    'Content-Type' => 'image/jpeg' ,
                    'Content-Disposition' => 'inline; file="'.$file.'"'
                    ]);
            } elseif(pathinfo($file)['extension'] == 'pdf') {
                return response()->make(file_get_contents($path), 200, [
                    'Content-Type' => 'application/pdf', 
                    'Content-Disposition' => 'inline; file="'.$file.'"'
                ]);
            } else {
               return response()->download($path);
            }
		} else {
			return back();
        }
    }
}
