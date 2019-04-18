<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'code',
        'information',
        'background',
        'admin_id'
    ];

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function speakers()
    {
        return $this->hasMany('App\Models\Speaker');
    }

    public function scheduleBlocks()
    {
        return $this->hasMany('App\Models\ScheduleBlock')->orderBy('day')->orderBy('time');
    }

    public function dayCount()
    {
        $end_date = DateTime::createFromFormat("Y-m-d", $this->end_date);
        $start_date = DateTime::createFromFormat("Y-m-d", $this->start_date);
        $interval = $end_date->diff($start_date);
        return $interval->d + 1;
    }

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }
}
