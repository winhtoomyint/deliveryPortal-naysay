<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Speaker;
use App\Models\Eventcategory;
use App\Models\Organizer;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events = Event::all();
        $categories = Eventcategory::all();
        return view('Event.index',compact('events','categories'));
    }
    public function eventdetail($id){
        //dd($id);
        $event = Event::find($id);
        // foreach($event->venue->images as $image){
        //     dd($image[0]);
        // }
        return view('Event.eventdetail',compact('event'));
    }

    public function speakerdetail($id){
        $speaker = Speaker::find($id);
        return view('Event.speakerdetail',compact('speaker'));
    }
}
