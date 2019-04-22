<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'rating',
        'rating_id'
    ];

    public function rating()
    {
        return $this->belongsTo('App\Models\Rating');
    }
}
