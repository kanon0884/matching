<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club_schedules extends Model
{
    use HasFactory;
    
    public function category()
    {
    return $this->belongsTo(Club::class);
    return $this->belongsTo(Schedule::class);
    }
}
