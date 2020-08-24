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
    public function index()
    {
        $permohonan = Ramuan::whereNull('tarikh_buka')->paginate(10);
        return view('client/daftar',compact('permohonan'));
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
        $bahan = Ref_Sumber_Bahan::where('status',0)->get();
        $negara = Ref_Negara::where('status',0)->get();
        $negeri = Ref_Negeri::where('status',0)->get();
        $dokumen = Ref_Dokumen::where('status',0)->get();

        return view('client/modal',compact('rs','bahan','negara','negeri','dokumen'));
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
            $ingredient->negara_pembekal_id = $request->negeri_bekal;
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

            $ramuan_doc = new Ramuan_Dokumen();
            $ramuan_doc->ramuan_id = $request->id;
            $ramuan_doc->ref_dokumen_id = 1;
            $ramuan_doc->file_name = $file;
            $ramuan_doc->file_type = $type;

            $ramuan_doc->save();
            if($ramuan_doc){
                $ramuan = Ramuan::where('id', $request->id)->update(['is_sijil'=>1,'tarikh_tamat_sijil'=>$request->tarikh_tamat_sijil,'status'=>1,'update_dt'=>now(),'update_by'=>1]);
                
                return response()->json('OK');
            } else {
                return response()->json('ERR');
            }

        } else {
            
            dd($request->upload_2);
            for ($i=2; $i<=6; $i++) {
                if(!empty($request->input('upload_'.$i))){
                    $file = $request->input['upload_'.$i]->getClientOriginalName();
                    $type = pathinfo($file)['extension'];
                    $path = $request->input['upload_'.$i]->storeAs('dokumen_ramuan', $file);
        
                    $ramuan_doc = new Ramuan_Dokumen();
                    $ramuan_doc->ramuan_id = $request->id;
                    $ramuan_doc->ref_dokumen_id = $i;
                    $ramuan_doc->file_name = $file;
                    $ramuan_doc->file_type = $type;
        
                    $ramuan_doc->save();    
                }
            }
            
            $ramuan = Ramuan::where('id', $request->id)->update(['is_sijil'=>0,'status'=>1,'update_dt'=>now(),'update_by'=>1]);
            if($ramuan) {   
                return response()->json('OK');
            } else {
                return response()->json('ERR');
            }
            
            // if(!empty($request->upload_3)){
            //     $file = $request->upload_3->getClientOriginalName();
            //     $type = pathinfo($file)['extension'];
            //     $path = $request->upload_3->storeAs('dokumen_ramuan', $file);
    
            //     $ramuan_doc = new Ramuan_Dokumen();
            //     $ramuan_doc->ramuan_id = $request->id;
            //     $ramuan_doc->ref_dokumen_id = 3;
            //     $ramuan_doc->file_name = $file;
            //     $ramuan_doc->file_type = $type;
    
            //     $ramuan_doc->save();    
            // }if(!empty($request->upload_4)){
            //     $file = $request->upload_4->getClientOriginalName();
            //     $type = pathinfo($file)['extension'];
            //     $path = $request->upload_4->storeAs('dokumen_ramuan', $file);
    
            //     $ramuan_doc = new Ramuan_Dokumen();
            //     $ramuan_doc->ramuan_id = $request->id;
            //     $ramuan_doc->ref_dokumen_id = 4;
            //     $ramuan_doc->file_name = $file;
            //     $ramuan_doc->file_type = $type;
    
            //     $ramuan_doc->save();    
            // }if(!empty($request->upload_5)){
            //     $file = $request->upload_5->getClientOriginalName();
            //     $type = pathinfo($file)['extension'];
            //     $path = $request->upload_5->storeAs('dokumen_ramuan', $file);
    
            //     $ramuan_doc = new Ramuan_Dokumen();
            //     $ramuan_doc->ramuan_id = $request->id;
            //     $ramuan_doc->ref_dokumen_id = 5;
            //     $ramuan_doc->file_name = $file;
            //     $ramuan_doc->file_type = $type;
    
            //     $ramuan_doc->save();    
            // }if(!empty($request->upload_6)){
            //     $file = $request->upload_6->getClientOriginalName();
            //     $type = pathinfo($file)['extension'];
            //     $path = $request->upload_6->storeAs('dokumen_ramuan', $file);
    
            //     $ramuan_doc = new Ramuan_Dokumen();
            //     $ramuan_doc->ramuan_id = $request->id;
            //     $ramuan_doc->ref_dokumen_id = 6;
            //     $ramuan_doc->nama_dokumen = $request->nama_lain;
            //     $ramuan_doc->file_name = $file;
            //     $ramuan_doc->file_type = $type;
    
            //     $ramuan_doc->save();    
            // }
        }
    }

    public function view($id)
    {
        return view('client/view',compact('id'));
    }

    public function delete()
    {
        
    }
}
