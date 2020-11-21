<?php

namespace App\Http\Controllers\Jais;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use App\Ramuan;
use App\Ref_Sumber_Bahan;
use App\Calendar_Event;
use App\Mail\PengumumanMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SyarikatController extends Controller
{
    public function index(Request $request)
    {
        $client = Client::where('status',0)->where('is_delete',0);
        if(!empty($request->carian)){ 
            $client->where(function($query) use ($request) {
            $query->where('company_name','LIKE','%'.$request->carian.'%')->orWhere('company_reg_code','LIKE','%'.$request->carian.'%');
            }); 
        } 
        $client = $client->orderBy('userid','ASC')->paginate(10);
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
        if(!empty($request->carian)){ $ramuan->where(function($query) use ($request){
            $query->where('nama_ramuan','LIKE','%'.$request->carian.'%')->orWhere('nama_saintifik','LIKE','%'.$request->carian.'%')->orWhere('nama_pengilang','LIKE','%'.$request->carian.'%')->orWhere('ing_kod','LIKE','%'.$request->carian.'%');
        }); }
        
        $ramuan = $ramuan->orderBy('create_dt','DESC')->paginate(10);

        
        return view('admin/ramuan',compact('syarikat','cat','ramuan'));
    }

    public function detail($id)
    {
        // dd($id);
        $rs = Ramuan::find($id);
        return view('admin/modal_detail',compact('rs'));
    }

    public function announcement(Request $request,$id)
    {
        $comp = Client::where('userid',$id)->first();
        // $events = Calendar_Event::where('company_id', $id)->first();
        $event = Calendar_Event::where('company_id', $id)->where('is_delete', 0)->where('kategori', 1);

        $compId = $id;

        if(!empty($request->carian)){ $event->where(function($query) use ($request){
            $query->where('event','LIKE','%'.$request->carian.'%');
        }); }

        $event = $event->orderBy('created_dt')->paginate(10);

        return view('admin/pengumumanSyarikat', compact('comp', 'event', 'compId'));
    }

    public function pengumuman_create($id) 
    {
        $comp = Client::where('userid',$id)->first();
        // dd($comp);
        return view('admin/modalPengumumanSyarikat', compact('comp'));
    }

    public function pengumuman($id)
    {        
        $event = Calendar_Event::where('id', $id)->first();
        $comp = Client::where('userid',$event->company_id)->first();
        // dd($comp);
        return view('admin/modalPengumumanSyarikat',compact('event', 'comp'));
    }

    public function simpan(request $request)
    {
        // dd($request->all());
        $user = Auth::guard('admin')->user()->id;
        
        if(!empty($request->doc)){
            $file = $request->doc->getClientOriginalName();
            $type = pathinfo($file)['extension'];
            $path = $request->doc->storeAs('dokumen_pengumuman', $file); 
        } else {
            $file = '';
            $type = '';
        } 

        if(!empty($file)){
            $showFile = $file;
        } else {
            $showFile = $request->curr_doc;
        }

        if(!empty($request->id_event)){ 
            $data = array(
                'event' => $request->event,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'announcement' => $request->catatan_text,
                'company_id' => $request->id_comp,
                'kategori' => 1,
                'is_public' => 3,
                'file_name' => $showFile,
                'file_type' => $type,
                'updated_dt' => now(),
                'updated_by' => $user,
            );

            $event = Calendar_Event::where('id',$request->id_event)->update($data);

            if($event){
                $this->mail_pengumuman($request->id_event);
                return response()->json('OK');
            } else {
                return response()->json('ERR');
            }
        } else { 
            $event = new Calendar_Event();
            $event->event = $request->event;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->announcement = $request->catatan_text;
            $event->company_id = $request->id_comp;
            $event->kategori = 1;
            $event->is_public = 3;
            $event->file_name = $showFile;
            $event->file_type = $type; 
            $event->created_dt = now();
            $event->created_by = $user;
            $event->updated_dt = now();
            $event->updated_by = $user;

            $event->save();
            // dd($event->id);
            if($event){
                $this->mail_pengumuman($event->id);
                return response()->json('OK');
            } else {
                return response()->json('ERR');
            }
        }      
    }

    private function mail_pengumuman($id)
    {
        $event = Calendar_Event::find($id);
        // dd($event->syarikat->company_email);
        $data = [
            'title' => $event->event,
            'content' => $event->announcement,
            'attachment' => $event->file_name,
            'start_date' => $event->start_date,
            'end_date' => $event->end_date
        ];

        Mail::to($event->syarikat->company_email)->send(new PengumumanMail($data));
    }
}
