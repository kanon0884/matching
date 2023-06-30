<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Schedule;
use App\Models\Club;
use App\Models\Genre;
use App\Models\User;
use App\Http\Requests\ClubRequest;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function first(Club $club, User $user)
    {
        return view('posts.posts')->with(['club' => $club, 'user' => $user]);
    }
    
    public function index(Event $event, Club $club)
    {
         return view('posts.index')->with(['events' => $event->getPaginateByLimit(), 'club' => $club]);
    }
    
     public function create(Genre $genre)
    {
        return view('posts.club_create')->with(['genres' => $genre->get()]);
    }
    
    public function store(Request $request, Club $club)
    {
        //dd($club);
        $input = $request['club'];
        $club->fill($input)->save();
        dd($club);
        return redirect('/club/' . $club->id);
    }
    
    public function edit(Genre $genre)
    {
        return view('posts.club_create')->with(['genres' => $genre->get()]);
    }
    
      public function update(Request $request, Club $club)
    {
        //dd($genre);
        $input = $request['club'];
        $club->fill($input)->save();
        return redirect('/club/' . $club->id);
    }
}
