<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleBlock extends Model
{

    protected $fillable = [
        'name',
        'time',
        'day',
        'event_id',
        'speaker_id'
    ];

    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

    public function speaker()
    {
        return $this->belongsTo('App\Models\Speaker');
    }
}
