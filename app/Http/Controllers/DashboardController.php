<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Acaronlex\LaravelCalendar\Calendar;
use App\Ramuan;

class DashboardController extends Controller
{
    public function client()
    {
        $user = Auth::guard('client')->user()->userid;
        // dd($user);
        // dd($request->all());
        $mohon = Ramuan::where('status','<>',3)->where('status','<>',6)->where('is_delete',0)->where('create_by',$user)->get();
        $tolak = Ramuan::where('status',6)->where('is_delete',0)->where('create_by',$user)->get();
        $ramuan = Ramuan::where('status',3)->where('is_delete',0)->where('create_by',$user)->get();
        $hapus = Ramuan::where('is_delete',1)->where('create_by',$user)->get();

        return view('client/dashboard',compact('mohon','tolak','ramuan','hapus'));
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
        $semak = Ramuan::where('status',1)->whereNotNull('tarikh_buka');
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
    
    public function pengumuman()
    {
        return view('admin/pengumuman');
    }
    
    public function pengumuman_create()
    {
        return view('admin/pengumuman_create');
    }
    
    public function pengumuman_view($id)
    {
        return view('admin/pengumuman_view');
    }
}
