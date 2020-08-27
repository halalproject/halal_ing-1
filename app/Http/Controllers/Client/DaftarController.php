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

class DaftarController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $permohonan = Ramuan::where('is_delete',0);

        if($request->sijil != ''){ $permohonan->where('is_sijil',$request->sijil); }
        if(!empty($request->kategori)){ $permohonan->where('sumber_bahan_id',$request->kategori); }
        if(!empty($request->carian)){ $permohonan->where('nama_ramuan','LIKE','%'.$request->carian.'%')->orWhere('nama_saintifik','LIKE','%'.$request->carian.'%'); }
        
        $permohonan = $permohonan->orderBy('create_dt','DESC')->paginate(10);
        $cat = Ref_Sumber_Bahan::get();
        
        return view('client/daftar',compact('permohonan','cat'));
    }

    public function create()
    {
        $bahan = Ref_Sumber_Bahan::where('status',0)->get();
        $negara = Ref_Negara::where('status',0)->get();
        $negeri = Ref_Negeri::where('status',0)->get();
        $dokumen = Ref_Dokumen::where('status',0)->get();

        // dd($negara);

        return view('client/modal',compact('bahan','negara','negeri','dokumen'));
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

        // dd($upload);

        return view('client/modal',compact('rs','upload','bahan','negara','negeri','dokumen'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        if(empty($request->id)){

            $kod = "C000".uniqid();

            $ingredient = new Ramuan();
            $ingredient->ing_kod = $kod;
            $ingredient->nama_ramuan = $request->ramuan;
            $ingredient->nama_saintifik = $request->saintifik;
            $ingredient->sumber_bahan_id = $request->sumber;
            $ingredient->negara_pengilang_id = $request->negara_kilang;
            $ingredient->alamat_pengilang_1 = $request->kilang_alamat_1;
            $ingredient->alamat_pengilang_2 = $request->kilang_alamat_2;
            $ingredient->alamat_pengilang_3 = $request->kilang_bandar;
            $ingredient->poskod_pengilang = $request->kilang_poskod;
            $ingredient->negeri_pembekal_id = $request->negeri_bekal;
            $ingredient->alamat_pembekal_1 = $request->bekal_alamat_1;
            $ingredient->alamat_pembekal_2 = $request->bekal_alamat_2;
            $ingredient->alamat_pembekal_3 = $request->bekal_bandar;
            $ingredient->poskod_pembekal = $request->bekal_poskod;
            $ingredient->status = 0;
            $ingredient->create_dt = now();
            $ingredient->create_by = 1;
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
                'sumber_bahan_id' => $request->sumber,
                'negara_pengilang_id' => $request->negara_kilang,
                'alamat_pengilang_1' => $request->kilang_alamat_1,
                'alamat_pengilang_2' => $request->kilang_alamat_2,
                'alamat_pengilang_3' => $request->kilang_bandar,
                'poskod_pengilang' => $request->kilang_poskod,
                'negeri_pembekal_id' => $request->negeri_bekal,
                'alamat_pembekal_1' => $request->bekal_alamat_1,
                'alamat_pembekal_2' => $request->bekal_alamat_2,
                'alamat_pembekal_3' => $request->bekal_bandar,
                'poskod_pembekal' => $request->bekal_poskod,
                'update_dt' => now(),
                'update_by' => 1,
            );

            $permohonan = Ramuan::where('id',$request->id)->update($data);

            if($permohonan){
                return response()->json(['OK',$request->id]);
            } else {
                return response()->json('ERR');
            }
        }
    }

    public function upload(Request $request)
    {
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
                $ramuan = Ramuan::where('id', $request->id)->update(['is_sijil'=>1,'tarikh_tamat_sijil'=>$request->tarikh_tamat_sijil,'status'=>1,'update_dt'=>now(),'update_by'=>1]);
                
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
            
            $ramuan = Ramuan::where('id', $request->id)->update(['is_sijil'=>0,'status'=>1,'update_dt'=>now(),'update_by'=>1]);
            if($ramuan) {   
                return response()->json('OK');
            } else {
                return response()->json('ERR');
            }
        }
    }

    public function view($id)
    {
        return view('client/view',compact('id'));
    }

    public function delete($id)
    {
        // dd($id);
        $ramuan = Ramuan::find($id)->update(['is_delete'=>1,'delete_dt'=>now(),'delete_by'=>1]);

        if($ramuan){
            return response()->json('OK');
        } else {
            return response()->json('ERR');
        }
    }
}
