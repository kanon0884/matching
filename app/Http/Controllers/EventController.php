<?php

namespace App\Http\Controllers;


use App\Models\Event;
use App\Models\Schedule;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    public function index(Event $event, Schedule $schedule)
    {
        return view('events.index')->with(['events' => $event->getPaginateByLimit(), 'schedule' => $schedule]);
    }
    
    public function show(Event $event, Schedule $schedule) 
    {
        return view('events.show')->with(['event' => $event, 'schedule' => $schedule]);
    }
    
    public function posts(Event $event)
    {
        return view('posts.posts')->with(['event' =>$event]);
    }
    
    public function event_create(Event $event, Schedule $schedule)
    {
        return view('posts.event_create')->with(['event' => $event, 'schedule' => $schedule]);
    }
    
    public function event_store(EventRequest $request, Event $event, Schedule $schedule)
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
    
    public function event_edit(Event $event, Schedule $schedule)
    {
        return view('posts.event_edit')->with(['event' => $event, 'schedule' => $schedule]);
    }
    
    public function event_update(EventRequest $request, Event $event, Schedule $schedule)
    {
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
    
    public function club_index(Event $event, Schedule $schedule)
    {
         return view('posts.index')->with(['events' => $event->getPaginateByLimit(), 'schedule' => $schedule]);
    }
    
    public function event_delete(Event $event)
    {
        $event->delete();
        return redirect('/posts/events');
    }
}
