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

    public function updateChoices(Request $request)
    {
        foreach ($request->choice as $id => $answer) {
            $choice = $this->choices()->find($id);
            if ($choice) {
                $choice->answer = $answer;
                $choice->save();
            } else {
                $newChoice = new Choice;
                $newChoice->fill([
                    'answer' => $answer
                ]);
                $this->choices()->save($newChoice);
            }
        }
    }

    public function addVote(Request $request)
    {
        $choice = Choice::find($request->choice_id);
        $choice->count = $choice->count + 1;
        $choice->save();
    }
}
