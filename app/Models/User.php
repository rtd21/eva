<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'company',
        'event_id',
        'points'
    ];

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    public function blocks()
    {
        return $this->belongsToMany('App\Models\ScheduleBlock', 'block_user', 'user_id', 'block_id');
    }

    public function speakersWereLiked()
    {
        return $this->belongsToMany('App\Models\Speaker', 'likes', 'user_id', 'speaker_id');
    }
}
