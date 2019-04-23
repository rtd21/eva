<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Storage;
use Image;

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

    public function addPhoto(Request $request)
    {
        $photo = $request->file('image');
        $fillName = $this->id . '.' . $photo->getClientOriginalExtension();
        $img = Image::make($photo)
            ->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->encode('jpg', 80);
        Storage::disk('public')->put('/photos/'.$fillName, $img);
        $this->photo = '/storage/photos/'.$fillName;
        $this->save();
    }

    public function usersWhoLike()
    {
        return $this->belongsToMany('App\Models\User', 'likes', 'speaker_id', 'user_id');
    }

    public function like($user_id)
    {
        $user = User::find($user_id);
        $this->usersWhoLike()->save($user);
        $this->save();
    }
}
