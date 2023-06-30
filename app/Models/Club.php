<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    
    public function club_schedules()   
    {
    return $this->hasMany(Club_schedule::class);
    }
    
    public function events()   
    {
    return $this->hasMany(Event::class);
    }
    
    public function genre()   
    {
    return $this->belongsTo(Genre::class);
    }
    
    public function user()
    { 
    return $this->belongsTo(User::class);
    }
    
    protected $fillable = [
        'name',
        'genre_id',
        'activity',
        'image',
    ];
    
    function getPaginateByLimit(int $limit_count = 5)
    {
    return $this::with('genre')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
