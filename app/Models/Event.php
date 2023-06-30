<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function club()
    {
    return $this->belongsTo(Club::class);
    }
    
    public function schedule()
    {
    return $this->belongsTo(Schedule::class);
    }
    
    public function users()
    {
    return $this->hasMany(User::class);
    }
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    protected $fillable = [
        'title', 
        'place',
        'schedule_id',
        'detail',
    ];
}
