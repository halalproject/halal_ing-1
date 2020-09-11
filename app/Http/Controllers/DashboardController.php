<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Acaronlex\LaravelCalendar\Calendar;
use App\Ramuan;
use App\calendar_event;

class DashboardController extends Controller
{
    public function client()
    {
        $user = Auth::guard('client')->user()->userid;
        // dd($user);
        // dd($request->all());
        $mohon = Ramuan::where('create_by',$user)->where('status','<>',3)->where('status','<>',6)->where('is_delete',0)->get();
        $tolak = Ramuan::where('create_by',$user)->where('status',6)->where('is_delete',0)->get();
        $ramuan = Ramuan::where('create_by',$user)->where('status',3)->where('is_delete',0)->get();
        $hapus = Ramuan::where('create_by',$user)->where('is_delete',1)->get();

        $rstm = Ramuan::where('create_by',$user)->where('status',3)->where('is_delete',0)->whereBetween('tarikh_tamat_sijil',[now()->addDays(30),now()->addDays(90)])->get();
        $rsom = Ramuan::where('create_by',$user)->where('status',3)->where('is_delete',0)->whereBetween('tarikh_tamat_sijil',[now()->addDays(7),now()->addDays(30)])->get();
        $rsod = Ramuan::where('create_by',$user)->where('status',3)->where('is_delete',0)->where('tarikh_tamat_sijil','<=',now()->addDays(7))->get();

        return view('client/dashboard',compact('mohon','tolak','ramuan','hapus','rstm','rsom','rsod'));
    }

    public function admin()
    {
        $events = [];

        $events[] = \Calendar::event(
            'Event One', //event title
            false, //full day event?
            '2020-08-11T0800', //start time (you can also use Carbon instead of DateTime)
            '2020-08-12T0800', //end time (you can also use Carbon instead of DateTime)
            0 //optionally, you can specify an event ID
        );
        
        $events[] = \Calendar::event(
            "Valentine's Day", //event title
            true, //full day event?
            new \DateTime('2020-08-14'), //start time (you can also use Carbon instead of DateTime)
            new \DateTime('2020-08-14'), //end time (you can also use Carbon instead of DateTime)
            '1' //optionally, you can specify an event ID
        );
        
        
        $calendar = new Calendar();
        $calendar->addEvents($events)
        ->setOptions([
            'locale' => 'ms',
            'firstDay' => 0,
            'height' => 450,
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


        return view('admin/dashboard',compact('calendar','baru','semak','lulus','audit'));
    }
    
    public function event_create()
    {
        return view('admin/event_create');
    }
    
    public function event_view($id)
    {
        // dd($id);
        return view('admin/event_view');
    }
    
    public function pengumuman(Request $request)
    {
        $calendar = calendar_event::where('is_delete',0);

        if(!empty($request->carian)) { 
            $calendar->where('event','LIKE','%'.$request->carian.'%'); 
        }

        $calendar = $calendar->orderBy('created_dt')->paginate(10);
        
        return view('admin/pengumuman', compact('calendar'));
    }
    
    public function pengumuman_view($id)
    {
        return view('admin/pengumuman_view');
    }

    public function pengumuman_create()
    {
        return view('admin/pengumuman_create');
    }

    public function pengumuman_store(Request $request)
    {
        
        $user = Auth::guard('admin')->user()->id; 
        $file = $request->doc->getClientOriginalName();
        $type = pathinfo($file)['extension'];
        $path = $request->doc->storeAs('dokumen_pengumuman', $file); 
// dd($file);
        // dd($file);

        if(empty($request->id)) {
            $event = new calendar_event();
            $event->event = $request->event;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->kategori = $request->kategori;
            $event->announcement = $request->catatan_text;
            $event->is_public = $request->pengumuman_untuk;
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

        return view('admin/pengumuman_create',compact('calendar'));
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
