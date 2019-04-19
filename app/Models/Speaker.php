<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    protected $fillable = [
        'full_name',
        'position',
        'company',
        'photo',
        'information',
        'event_id'
    ];

    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

    public function block()
    {
        return $this->hasOne('App\Models\ScheduleBlock');
    }

    public function addPhoto($image)
    {
    }
}
