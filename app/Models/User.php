<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
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
}
