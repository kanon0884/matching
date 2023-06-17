<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    
    public function category()
    {
    return $this->belongsTo(Club::class);
    return $this->belongsTo(Schedule::class);
    return $this->hasMany(User::class);
    }
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    protected $fillable = [
        'title', 
        'place', 
        'detail',
    ];
}
