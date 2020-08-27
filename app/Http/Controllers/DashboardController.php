<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Acaronlex\LaravelCalendar\Calendar;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin,client']);
    }

    public function client()
    {
        return view('client/dashboard');
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
            'select' => 'function(selectionInfo){alert()}',
            'eventClick' => 'function(event){ alert(event.title) }'
        ]);

        return view('admin/dashboard',compact('calendar'));
    }
}
