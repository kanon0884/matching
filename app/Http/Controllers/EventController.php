<?php

namespace App\Http\Controllers;


use App\Models\Event;
use App\Models\Schedule;
use App\Models\Club;
use App\Models\Genre;
use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
    
    public function index(Event $event, Schedule $schedule, Club $club, Genre $genre)
    {
        return view('events.index')->with(['events' => $event->getPaginateByLimit(), 'schedule' => $schedule, 'club' => $club, 'genre' =>$genre]);
    }
    
    public function create(Schedule $schedule)
    {
        return view('posts.event_create')->with(['schedule' => $schedule->get()]);
    }
    
    public function store(EventRequest $request, Event $event, Club $club)
    {
        $input = $request['event'];
        $event->fill($input)->save();
        return redirect('/club/{club}'. $club->id);
    }
    
    public function event_edit(Event $event, Schedule $schedule)
    {
        return view('posts.event_edit')->with(['event' => $event, 'schedule' => $schedule]);
    }
    
    public function event_update(EventRequest $request, Event $event, Schedule $schedule, Club $club, Genre $genre)
    {
        $input = $request['event'];
        $event->fill($input)->save();
        return redirect('/club/{club}'. $club->id);
    }
    
    public function event_delete(Event $event)
    {
        $event->delete();
        return redirect('/posts/events');
    }
    
    public function search(Genre $genre)
    {
        return view('events.search')->with(['genres' => $genre->get()]);
    }
    
    public function results(Event $event, Schedule $schedule, Club $club, Genre $genre)
    {
        return view('events.results')->with(['events' => $event, 'event' => $event, 'schedule' => $schedule, 'club' => $club, 'genre' =>$genre]);
    }
    
    public function show(Event $event, Schedule $schedule, Club $club, Genre $genre) 
    {
        //dd($event);
        return view('events.show')->with(['event' => $event, 'schedule' => $schedule, 'club' => $club, 'genre' =>$genre]);
    }
    
    public function favorites()
    {
        return view('events.favorites');
    }
    
}
