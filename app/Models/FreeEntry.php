<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class FreeEntry extends Model
{
    protected $fillable = [
        'question',
        'voting_open',
        'results_visible',
        'activate_poll',
        'event_id'
    ];

    public function answers()
    {
        return $this->hasMany('App\Models\FreeEntryAnswer');
    }

    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

    public function setParams(Request $request)
    {
        $this->voting_open = 0;
        $this->results_visible = 0;
        $this->activate_poll = 0;
        if (isset($request->voting_open)) {
            $this->voting_open = 1;
        }
        if (isset($request->results_visible)) {
            $this->results_visible = 1;
        }
        if (isset($request->activate_poll)) {
            $this->activate_poll = 1;
        }
    }
}
