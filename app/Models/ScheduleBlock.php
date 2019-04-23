<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'block_user', 'block_id', 'user_id');
    }

    public function registerUser(Request $request)
    {
        $user = User::find($request->user_id);
        $this->users()->save($user);
        $this->save();
    }
}
