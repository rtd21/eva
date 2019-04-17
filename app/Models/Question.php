<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

    public function replies()
    {
        return $this->hasMany('App\Models\Reply');
    }

    public function addReply($reply_text)
    {
        $reply = new Reply;
        $reply->fill([
           'reply' =>  $reply_text
        ]);
        $this->replies()->save($reply);
    }
}
