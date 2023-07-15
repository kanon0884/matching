<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
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
    
    protected $fillable = [
        'datetime',
    ];

}
