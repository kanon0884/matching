<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Schedule;
use App\Models\Club;
use App\Models\Genre;
use App\Models\User;
use App\Http\Requests\ClubRequest;
use Illuminate\Http\Request;
use Cloudinary;

class ClubController extends Controller
{
    public function first(Club $club, User $user)
    {
        return view('posts.posts')->with(['club' => $club, 'user' => $user]);
    }
    
    public function index(Event $event, Club $club)
    {
         return view('posts.index')->with(['events' => $event->getPaginateByLimit(), 'clubs' => $club->get()]);
    }
    
     public function create(Genre $genre)
    {
        return view('posts.club_create')->with(['genres' => $genre->get()]);
    }
    
    public function store(Request $request, Club $club)
    {
        $club->user_id = \Auth::user()->id;
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input = $request['club'];
        $input += ['image_url' => $image_url];
        $club->fill($input)->save();
        return redirect('/clubs/' . $club->user_id);
        
    }
    
    public function edit(Genre $genre, Club $club)
    {
        return view('posts.club_edit')->with(['club' => $club, 'genres' => $genre->get()]);
    }
    
      public function update(Request $request, Club $club)
    {
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input = $request['club'];
        $input += ['image_url' => $image_url];
        $club->fill($input)->save();
        return redirect('/club/' . $club->id);
    }
}
