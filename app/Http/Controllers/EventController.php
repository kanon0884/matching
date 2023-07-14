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
    
    public function index(Event $event, Club $club, Genre $genre)
    {
        return view('events.index')->with(['events' => $event->getPaginateByLimit(), 'schedule' => $schedule, 'club' => $club, 'genre' =>$genre]);
    }
    
    public function create(Club $club)
    {
        return view('posts.event_create')->with(['club' => $club]);
    }
    
    public function store(Request $request, Event $event, Club $club)
    {
        $event->user_id = \Auth::user()->id;
        $input = $request['event'];
        $input["club_id"] = $club->id;
        $event->fill($input)->save();
        return redirect('/clubs/' . $event->user_id);
    }
    
    public function edit(Event $event)
    {
        return view('posts.event_edit')->with(['event' => $event]);
    }
    
    public function event_update(EventRequest $request, Event $event, Club $club, Genre $genre)
    {
        $input = $request['event'];
        $event->fill($input)->save();
        return redirect('/club/{club}'. $club->id);
    }
    
    public function delete(Event $event)
    {
        $event->delete();
        return redirect('/club/{club}' . $club->id);
    }
    
    
    public function results(Event $event, Club $club, Genre $genre)
    {
        return view('events.results')->with(['events' => $event, 'event' => $event, 'club' => $club, 'genre' =>$genre]);
    }
    
    public function show(Event $event, Club $club, Genre $genre) 
    {
        //dd($event);
        return view('events.show')->with(['events' => $event, 'event' => $event, 'club' => $club, 'genre' =>$genre]);
    }
    
    public function favorites()
    {
        return view('events.favorites');
    }
    
    public function search(Request $request, Genre $genre, Club $club)
    {
        $club = $request->input('club');
        //$event = $request->input('event');
        //$genre = $request->input('genre');
        $keyword = $request->input('keyword');
        $genre1 = $request->input('genre');
        
        //$query = Club::query();
        //$query = Event::query();
        //$query = Genre::query();
        $clubs = null;
        if(!empty($keyword)){
            $clubs = Club::with('events')->where('name', 'LIKE', "%{$keyword}%")->get();
        }
        
        //$genre1 = null;
        if(!empty($genre1)){
            $genres = Genre::with('genres')->where('name', '=', "{$genre1}")->get();
        dd($genres);   
        }
        
        //if(!empty($event)){
        //    $query->where('schedule', 'LIKE', $event);
        //}
            
        //$clubs = $query->get();
        //$genres = $query->get();
        //$Event_list = Event::all;
        $genre_list = Genre::all();
        
        return view('events.search')->with(['keyword' => $keyword, 'clubs' => $clubs, 'genres' => $genre, 'genre_list' =>$genre_list]);
    }
    
}
