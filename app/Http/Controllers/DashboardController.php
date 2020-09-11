<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Acaronlex\LaravelCalendar\Calendar;
use App\Ramuan;
use App\calendar_event;
use App\Client;
use App\Syarikat;
use App\Ref_Kategori_Event;

class DashboardController extends Controller
{
    public function client()
    {
        $user = Auth::guard('client')->user()->userid;

        $pengumuman = calendar_event::where('kategori',1)->where('is_public',3)->whereRaw('"'.date('Y-m-d').'"  between `start_date` and `end_date`')->get();

        // dd($pengumuman);
        // dd($request->all());
        $mohon = Ramuan::where('create_by',$user)->where('status','<>',3)->where('status','<>',6)->where('is_delete',0)->get();
        $tolak = Ramuan::where('create_by',$user)->where('status',6)->where('is_delete',0)->get();
        $ramuan = Ramuan::where('create_by',$user)->where('status',3)->where('is_delete',0)->get();
        $hapus = Ramuan::where('create_by',$user)->where('is_delete',1)->get();

        $rstm = Ramuan::where('create_by',$user)->where('status',3)->where('is_delete',0)->whereBetween('tarikh_tamat_sijil',[now()->addDays(30),now()->addDays(90)])->get();
        $rsom = Ramuan::where('create_by',$user)->where('status',3)->where('is_delete',0)->whereBetween('tarikh_tamat_sijil',[now()->addDays(7),now()->addDays(30)])->get();
        $rsod = Ramuan::where('create_by',$user)->where('status',3)->where('is_delete',0)->where('tarikh_tamat_sijil','<=',now()->addDays(7))->get();

        return view('client/dashboard',compact('pengumuman','mohon','tolak','ramuan','hapus','rstm','rsom','rsod'));
    }

    public function admin()
    {

        $pengumuman = calendar_event::where('kategori',1)->where('is_public',2)->whereRaw('"'.date('Y-m-d').'"  between `start_date` and `end_date`')->get();

        $details = calendar_event::whereIn('kategori',[2,3])->where('is_public',2)->get();

        // dd($pengumuman);

        $events = [];

        foreach ($details as $det) {
            if($det->start_date == $det->end_date){
                $status = true; 
            } else {
                $status = false; 
            }

            $events[] = \Calendar::event(
                $det->event, //event title
                $status, //full day event?
                $det->start_date, //start time (you can also use Carbon instead of DateTime)
                $det->end_date, //end time (you can also use Carbon instead of DateTime)
                $det->id //optionally, you can specify an event ID
            );   
        }
        
        $calendar = new Calendar();
        $calendar->addEvents($events)
        ->setOptions([
            'locale' => 'ms',
            'firstDay' => 0,
            'contentHeight'=> 'auto',
            'displayEventTime' => true,
            'initialView' => 'dayGridMonth',
            'headerToolbar' => [
                'end' => 'today prev,next'
            ]
        ]);
        $calendar->setId('1');
        $calendar->setCallbacks([
            'navLinks' => true,
            'navLinkDayClick' => 'function() {
                $("#myModal").modal("show").find(".modal-content").load("/admin/event"); 
              }',
            'eventClick' => 'function(info){
                $("#myModal").modal("show").find(".modal-content").load("/admin/event/view/"+info.event.id+""); 
             }'
        ]);

        $baru = Ramuan::where('status',1)->whereNull('tarikh_buka');
        $semak = Ramuan::where('status',1)->whereNotNull('tarikh_buka')->where('is_semak',0);
        $lulus = Ramuan::where('status',1)->where('is_semak',1);
        $audit = Ramuan::where('is_lulus',1)->where('is_delete',0);


        return view('admin/dashboard',compact('pengumuman','calendar','baru','semak','lulus','audit'));
    }
    
    public function event_create()
    {
        return view('admin/event_create');
    }
    
    public function event_view($id)
    {
        dd($id);
        return view('admin/event_view');
    }
    
    public function pengumuman(Request $request)
    {
        $calendar = calendar_event::where('is_delete',0);

        if(!empty($request->carian)) { 
            $calendar->where('event','LIKE','%'.$request->carian.'%'); 
        }

        $calendar = $calendar->orderBy('created_dt')->paginate(10);

        // dd($calendar);
        
        return view('admin/pengumuman', compact('calendar'));
    }
    
    public function pengumuman_view($id)
    {
        return view('admin/pengumuman_view');
    }

    public function pengumuman_create()
    {
        $comp = Client::where('is_delete',0)->get(); 
        $cat = Ref_Kategori_Event::where('status',0)->get(); 
        
        return view('admin/pengumuman_create', compact('comp', 'cat'));
    }

    public function pengumuman_store(Request $request)
    {
        
        $user = Auth::guard('admin')->user()->id; 
        
        if(!empty($request->doc)){
            $file = $request->doc->getClientOriginalName();
            $type = pathinfo($file)['extension'];
            $path = $request->doc->storeAs('dokumen_pengumuman', $file); 
        } else {
            $file = '';
            $type = '';
        }

        if($request->pengumuman_untuk !='4') { 
            $company = '';
        } else { 
            $company = $request->compName;
        }

        if(empty($request->id)) {
            $event = new calendar_event();
            $event->event = $request->event;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->kategori = $request->kategori;
            $event->announcement = $request->catatan_text;
            $event->is_public = $request->pengumuman_untuk;
            $event->company_id = $company;
            $event->file_name = $file;
            $event->file_type = $type; 
            $event->created_dt = now();
            $event->created_by = $user;
            $event->updated_dt = now();
            $event->updated_by = $user;

            $event->save();

            if($event){
                return response()->json('OK');
            } else {
                return response()->json('ERR');
            }
        
        } else {  
            $data = array(
                'event' => $request->event,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'kategori' => $request->kategori,
                'announcement' => $request->catatan_text,
                'is_public' => $request->pengumuman_untuk,
                'company_id' => $company ,
                'file_name' => $file,
                'file_type' => $type,
                'updated_dt' => now(),
                'updated_by' => $user,
            );

            

            $event = calendar_event::where('id',$request->id)->update($data);

            if($event){
                return response()->json('OK');
            } else {
                return response()->json('ERR');
            }
        }
        // return view('admin/pengumuman_create');
    }

    public function edit($id)
    {
        $calendar = calendar_event::find($id);
        
        $comp = Client::where('is_delete',0)->get(); 
        $cat = Ref_Kategori_Event::where('status',0)->get();

        return view('admin/pengumuman_create',compact('calendar', 'comp', 'cat'));
    }

    public function delete($id)
    {
        $user = Auth::guard('admin')->user()->id;
        // dd($id);
        $cal = calendar_event::find($id)->update(['is_delete'=>1,'deleted_dt'=>now(),'deleted_by'=>$user]);

        if($cal){
            return response()->json('OK');
        } else {
            return response()->json('ERR');
        }
    }
}
