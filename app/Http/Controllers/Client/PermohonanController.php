<?php

namespace App\Http\Controllers\Client;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ref_Sumber_Bahan;
use App\Ref_Negara;
use App\Ref_Negeri;
use App\Ref_Dokumen;
use App\Ramuan;
use App\Ramuan_Dokumen;
use App\Ref_Islamic_Body;
use App\Information;
use App\Mail\PemohonMail;
use App\Mail\PermohonanMail;
use App\Ramuan_Komen;
use App\Ref_Surat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PermohonanController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::guard('client')->user()->userid;
        // dd($user);
        // dd($request->all());
        $permohonan = Ramuan::where('create_by',$user)->where('status','<>',3)->where('status','<>',6)->where('is_delete',0);

        if($request->status != ''){ 
            if($request->status == '1'){
                $permohonan->where('status',1)->whereNull('tarikh_buka');
            } else if($request->status == '11'){
                $permohonan->where('status',1)->whereNotNull('tarikh_buka');
            } else {
                $permohonan->where('status',$request->status);
            }
        }
        if($request->kategori != ''){ $permohonan->where('ing_category',$request->kategori); }
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
        $information = Information::get();
        $inform = Information::whereBetween('id', array(5,10))->get();

        // dd($dokumen);

        return view('client/modal',compact('bahan','negara','negeri','dokumen','cb','information', 'inform'));
    }
    
    public function edit($id)
    {
        // dd($id);

        $rs = Ramuan::find($id);
        $upload = Ramuan_Dokumen::where('ramuan_id',$id)->where('is_delete',0)->get();
        // dd($upload);
        $bahan = Ref_Sumber_Bahan::where('status',0)->get();
        $negara = Ref_Negara::where('status',0)->get();
        $negeri = Ref_Negeri::where('status',0)->get();
        $dokumen = Ref_Dokumen::where('status',0)->get();
        $cb = Ref_Islamic_Body::where('is_deleted',0)->where('fldcountryid',$rs->negara_pengilang_id)->get();
        $dok = Ref_Dokumen::where('status',0)->whereBetween('id', array(2,6))->get();
        $information = Information::get();
        $inform = Information::whereBetween('id', array(5,10))->get();

        // dd($inform);

        return view('client/modal',compact('rs','upload','bahan','negara','negeri','dokumen','cb', 'dok','information','inform'));
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
        // dd($request->input('doc_2'));
        // $request->doc_1 == 1;

        if(!empty($request->upload_1 && $request->current_file_1)){
            if(!empty($request->upload_1)){
                $file = $request->upload_1->getClientOriginalName();
                $type = pathinfo($file)['extension'];
                $path = $request->upload_1->storeAs('dokumen_ramuan', $file);
            } 
            else {
                $file = $request->current_file_1;
                $type = pathinfo($file)['extension'];
            }
            
    
            $ramuan_doc = Ramuan_Dokumen::updateOrCreate(
                ['ramuan_id' => $request->id,'ref_dokumen_id' => 1],
                ['ref_dokumen_id' => 1,'file_name' => $file,'file_type' => $type, 'cbid' => $request->doc_otherNegara],
            );
    
            $ramuan_doc->save();
        }

        for ($i=2; $i<=6; $i++) {
            // dd($request->doc_.$i);
            if(!empty($request->file('upload_'.$i))){
                $file = $request->file('upload_'.$i)->getClientOriginalName();
                $type = pathinfo($file)['extension'];
                $path = $request->file('upload_'.$i)->storeAs('dokumen_ramuan', $file);
                
                $ramuan_doc = Ramuan_Dokumen::updateOrCreate(
                    ['ramuan_id' => $request->id,'ref_dokumen_id' => $i],
                    ['ref_dokumen_id' => $i,'file_name' => $file,'file_type' => $type],
                );

                
                if($i == 6){
                    $ramuan_doc = Ramuan_Dokumen::updateOrCreate(
                        ['ramuan_id' => $request->id,'ref_dokumen_id' => $i],
                        ['ref_dokumen_id' => $i,'nama_dokumen' => $request->nama_lain,'file_name' => $file,'file_type' => $type]
                    );
                }
    
                $ramuan_doc->save();    
            } else if(empty($request->input('doc_'.$i))){
                $ramuan_doc = Ramuan_Dokumen::where('ramuan_id',$request->id)->where('ref_dokumen_id',$i)->update(['is_delete'=>1]);
            }
        }

        if((!empty($request->upload_1)) || (!empty($request->current_file_1))){
            $ramuan = Ramuan::where('id', $request->id)->update(['is_sijil'=>1,'tarikh_tamat_sijil'=>$request->tarikh_tamat_sijil,'status'=>1,'update_dt'=>now(),'update_by'=>$user]);
        } else {
            $ramuan = Ramuan::where('id', $request->id)->update(['is_sijil'=>0,'status'=>1,'update_dt'=>now(),'update_by'=>$user]);
        }
        
        $this->notification($request->id);
        
        return response()->json('OK');
    }

    private function notification($id)
    {
        // dd($id);
        $ramuan = Ramuan::find($id);
        // dd($ramuan);
        
        $data = [
            'syarikat' => Client::where('userid',$ramuan->create_by)->first(),
            'ramuan' => Ramuan::find($id),
            'surat' => Ref_Surat::where('type','M')->where('kod','M_PEMOHON')->first(),
            'komen' => Ramuan_Komen::where('ramuan_id',$id)->first(),
        ];

        Mail::to('eidlan@yopmail.com')->send(new PemohonMail($data));
        Mail::to('eidlan@yopmail.com')->send(new PermohonanMail($data));
        // Mail::to($ramuan->syarikat->company_email)->send(new PemohonMail($data));
    }

    public function view($id)
    {
        $rs = Ramuan::find($id);
        $upload = Ramuan_Dokumen::where('ramuan_id',$id)->get();
        // dd($upload);

        return view('client/view',compact('rs', 'upload'));
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

        if($request->kategori != ''){ $permohonan->where('ing_category',$request->kategori); }
        if(!empty($request->carian)){ $permohonan->where(function($query) use($request){
            $query->where('nama_ramuan','LIKE','%'.$request->carian.'%')->orWhere('nama_saintifik','LIKE','%'.$request->carian.'%')->orWhere('ing_kod','LIKE','%'.$request->carian.'%');
        }); }
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

    public function downloadDocument($file)
	{
		// dd(pathinfo($file)['extension']);
        $path = storage_path().'/app/dokumen_ramuan/'.$file;
        $setFileType = pathinfo($file)['extension'];
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
