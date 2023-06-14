<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    
    public function posts()   
    {
    return $this->hasMany(Club_schedule::class);  
    return $this->hasMany(Event::class);
    return $this->belongsTo(Genre::class);
    }
    
}
