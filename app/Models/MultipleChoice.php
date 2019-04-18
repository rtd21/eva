<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MultipleChoice extends Model
{

    protected $fillable = [
        'question',
        'voting_open',
        'results_visible',
        'activate_poll',
        'event_id'
    ];

    public function choices()
    {
        return $this->hasMany('App\Models\Choice');
    }

    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

    public function setChoices(Request $request)
    {
        $this->save();
        foreach ($request->choice as $answer) {
            $choice = new Choice;
            $choice->fill([
                'answer' => $answer,
                'multiple_choice_id' => $this->id
            ]);
            $choice->save();
            $this->choices()->save($choice);
        }
        $this->save();
    }
}
