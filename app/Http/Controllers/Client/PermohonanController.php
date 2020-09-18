<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ref_Sumber_Bahan;
use App\Ref_Negara;
use App\Ref_Negeri;
use App\Ref_Dokumen;
use App\Ramuan;
use App\Ramuan_Dokumen;
use App\Ref_Islamic_Body;
use Illuminate\Support\Facades\Auth;

class PermohonanController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::guard('client')->user()->userid;
        // dd($user);
        // dd($request->all());
        $permohonan = Ramuan::where('create_by',$user)->where('status','<>',3)->where('status','<>',6)->where('is_delete',0);

        if($request->sijil != ''){ $permohonan->where('is_sijil',$request->sijil); }
        if($request->kategori != ''){ $permohonan->where('sumber_bahan_id',$request->kategori); }
        if(!empty($request->carian)){ $permohonan->where(function($query) use($request){
            $query->where('nama_ramuan','LIKE','%'.$request->carian.'%')->orWhere('nama_saintifik','LIKE','%'.$request->carian.'%')->orWhere('ing_kod','LIKE','%'.$request->carian.'%');
        }); }
        
        $permohonan = $permohonan->orderBy('create_dt','DESC')->paginate(10);
        $cat = Ref_Sumber_Bahan::get();
        
        return view('client/permohonan',compact('permohonan','cat'));
    }

    public function create()
    {
        $bahan = Ref_Sumber_Bahan::where('status',0)->get();
        $negara = Ref_Negara::where('status',0)->get();
        $negeri = Ref_Negeri::where('status',0)->get();
        $dokumen = Ref_Dokumen::where('status',0)->get();
        $cb = Ref_Islamic_Body::where('is_deleted',0)->get();

        // dd($negara);

        return view('client/modal',compact('bahan','negara','negeri','dokumen','cb'));
    }
    
    public function edit($id)
    {
        // dd($id);

        $rs = Ramuan::find($id);
        $upload = Ramuan_Dokumen::where('ramuan_id',$id)->get();
        // dd($upload);
        $bahan = Ref_Sumber_Bahan::where('status',0)->get();
        $negara = Ref_Negara::where('status',0)->get();
        $negeri = Ref_Negeri::where('status',0)->get();
        $dokumen = Ref_Dokumen::where('status',0)->get();
        $cb = Ref_Islamic_Body::where('is_deleted',0)->get();
        $dok = Ref_Dokumen::where('status',0)->whereBetween('id', array(2,6))->get();

        // dd($cb);

        return view('client/modal',compact('rs','upload','bahan','negara','negeri','dokumen','cb', 'dok'));
    }

    public function store(Request $request)
    {
        $user = Auth::guard('client')->user()->userid;
        // dd($request->all());
        if(empty($request->id)){

            $kod = "C000".uniqid();

            $ingredient = new Ramuan();
            $ingredient->ing_kod = $kod;
            $ingredient->nama_ramuan = $request->ramuan;
            $ingredient->nama_saintifik = $request->saintifik;
            $ingredient->ing_category = $request->sumber;
            $ingredient->negara_pengilang_id = $request->negara_kilang;
            $ingredient->nama_pengilang = $request->nama_pengilang;
            $ingredient->alamat_pengilang_1 = $request->kilang_alamat_1;
            $ingredient->alamat_pengilang_2 = $request->kilang_alamat_2;
            $ingredient->alamat_pengilang_3 = $request->kilang_bandar;
            $ingredient->poskod_pengilang = $request->kilang_poskod;
            $ingredient->negeri_pembekal_id = $request->negeri_bekal;
            $ingredient->nama_pembekal = $request->nama_pembekal;
            $ingredient->alamat_pembekal_1 = $request->bekal_alamat_1;
            $ingredient->alamat_pembekal_2 = $request->bekal_alamat_2;
            $ingredient->alamat_pembekal_3 = $request->bekal_bandar;
            $ingredient->poskod_pembekal = $request->bekal_poskod;
            $ingredient->status = 0;
            $ingredient->create_dt = now();
            $ingredient->create_by = $user;
            $ingredient->update_dt = now();
            $ingredient->update_by = 1;

            $ingredient->save();

            if($ingredient){
                return response()->json(['OK',$ingredient->id]);
            } else {
                return response()->json('ERR');
            }

        } else {
            $data = array(
                'nama_ramuan'=>$request->ramuan,
                'nama_saintifik' => $request->saintifik,
                'ing_category' => $request->sumber,
                'negara_pengilang_id' => $request->negara_kilang,
                'nama_pengilang' => $request->nama_pengilang,
                'alamat_pengilang_1' => $request->kilang_alamat_1,
                'alamat_pengilang_2' => $request->kilang_alamat_2,
                'alamat_pengilang_3' => $request->kilang_bandar,
                'poskod_pengilang' => $request->kilang_poskod,
                'negeri_pembekal_id' => $request->negeri_bekal,
                'nama_pembekal' => $request->nama_pembekal,
                'alamat_pembekal_1' => $request->bekal_alamat_1,
                'alamat_pembekal_2' => $request->bekal_alamat_2,
                'alamat_pembekal_3' => $request->bekal_bandar,
                'poskod_pembekal' => $request->bekal_poskod,
                'update_dt' => now(),
                'update_by' => $user,
            );

            $permohonan = Ramuan::where('id',$request->id)->update($data);

            if($permohonan){
                return response()->json(['OK',$request->id,$request->negara_kilang]);
            } else {
                return response()->json('ERR');
            }
        }
    }

    public function upload(Request $request)
    {
        $user = Auth::guard('client')->user()->userid;
        // dd($request->all());
        if(!empty($request->upload_1)){
            $file = $request->upload_1->getClientOriginalName();
            $type = pathinfo($file)['extension'];
            $path = $request->upload_1->storeAs('dokumen_ramuan', $file);

            $ramuan_doc = Ramuan_Dokumen::updateOrCreate(
                ['ramuan_id' => $request->id],
                ['ref_dokumen_id' => 1,'file_name' => $file,'file_type' => $type]
            );

            $ramuan_doc->save();

            if($ramuan_doc){
                $ramuan = Ramuan::where('id', $request->id)->update(['is_sijil'=>1,'tarikh_tamat_sijil'=>$request->tarikh_tamat_sijil,'status'=>1,'update_dt'=>now(),'update_by'=>$user]);
                
                return response()->json('OK');
            } else {
                return response()->json('ERR');
            }

        } else {
            
            // dd($request->file('upload_3'));
            for ($i=2; $i<=6; $i++) {
                if(!empty($request->file('upload_'.$i))){
                    $file = $request->file('upload_'.$i)->getClientOriginalName();
                    $type = pathinfo($file)['extension'];
                    $path = $request->file('upload_'.$i)->storeAs('dokumen_ramuan', $file);
                    
                    $ramuan_doc = Ramuan_Dokumen::updateOrCreate(
                        ['ramuan_id' => $request->id,'ref_dokumen_id' => $i],
                        ['ref_dokumen_id' => $i,'file_name' => $file,'file_type' => $type]
                    );

                    
                    if($i == 6){
                        $ramuan_doc = Ramuan_Dokumen::updateOrCreate(
                            ['ramuan_id' => $request->id,'ref_dokumen_id' => $i],
                            ['ref_dokumen_id' => $i,'nama_dokumen' => $request->nama_lain,'file_name' => $file,'file_type' => $type]
                        );
                    }
        
                    $ramuan_doc->save();    
                }
            }
            
            $ramuan = Ramuan::where('id', $request->id)->update(['is_sijil'=>0,'status'=>1,'update_dt'=>now(),'update_by'=>$user]);
            if($ramuan) {   
                return response()->json('OK');
            } else {
                return response()->json('ERR');
            }
        }
    }

    public function view($id)
    {
        $rs = Ramuan::find($id);

        return view('client/view',compact('rs'));
    }

    public function delete($id)
    {
        $user = Auth::guard('client')->user()->userid;
        // dd($id);
        $ramuan = Ramuan::find($id)->update(['is_delete'=>1,'delete_dt'=>now(),'delete_by'=>$user]);

        if($ramuan){
            return response()->json('OK');
        } else {
            return response()->json('ERR');
        }
    }

    public function tolak(Request $request)
    {
        $user = Auth::guard('client')->user()->userid;
        // dd($user);
        // dd($request->all());
        $permohonan = Ramuan::where('status',6);

        if($request->sijil != ''){ $permohonan->where('is_sijil',$request->sijil); }
        if($request->kategori != ''){ $permohonan->where('sumber_bahan_id',$request->kategori); }
        if(!empty($request->carian)){ $permohonan->where('nama_ramuan','LIKE','%'.$request->carian.'%')->orWhere('nama_saintifik','LIKE','%'.$request->carian.'%'); }
        
        $permohonan = $permohonan->where('create_by',$user)->orderBy('create_dt','DESC')->paginate(10);
        $cat = Ref_Sumber_Bahan::get();

        return view('client/tolak',compact('permohonan','cat'));
    }

    public function getDokumen($type)
    {
        // dd($type);
        if($type == 'MYS'){
            $dok = Ref_Dokumen::where('status',0)->get();
            $cb = NULL;
        } else {
            $dok = Ref_Dokumen::where('status',0)->whereBetween('id', array(2,6))->get();
            $cb = Ref_Islamic_Body::where('is_deleted',0)->where('fldcountryid',$type)->get();
        }

        if($dok){
            return response()->json(['OK',$dok,$cb]);
        } else {
            return response()->json('ERR');
        }

    }
}
