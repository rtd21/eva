<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagCloudAnswer extends Model
{
    protected $fillable = [
        'answer',
        'free_entry_id'
    ];

    public function tagCloud()
    {
        return $this->belongsTo('App\Models\TagCloud');
    }
}
