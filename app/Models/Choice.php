<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $fillable = [
        'answer',
        'multiple_choice_id'
    ];

    public function multipleChoice()
    {
        return $this->belongsTo('App\Models\MultipleChoice');
    }
}
