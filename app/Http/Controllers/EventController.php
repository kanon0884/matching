<?php

namespace App\Http\Controllers;


use App\Models\Event;
use App\Models\Schedule;
use App\Http\Requests\PostRequest;

class EventController extends Controller
{
    public function index(Event $event)
    {
        return view('events.index')->with(['events' => $event->getPaginateByLimit()]);
    }
    
    public function show(Event $event)
    {
        return view('events.show')->with(['event' => $event]);
    }
    
    public function posts(Event $event)
    {
        return view('posts.posts')->with(['event' =>$event]);
    }
    
    public function event_create(Event $event, Schedule $schedule)
    {
        return view('posts.event_create')->with(['event' => $event, 'schedule' => $schedule]);
    }
    
    public function store(PostRequest $request, Event $event, Schedule $schedule)
    {
        //dd($request['event']);
        $input_event = $request['event'];
        $input_schedule = $request['schedule'];
        $event->title = $input_event['title'];
        $event->place = $input_event['place'];
        $event->detail = $input_event['detail'];
        $schedule->datetime = $input_schedule['datetime'];
        $event->save();
        $schedule->save();
        return redirect('/events/'. $event->id);
    }
}
