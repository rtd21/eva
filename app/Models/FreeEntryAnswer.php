<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreeEntryAnswer extends Model
{
    protected $fillable = [
        'answer',
        'free_entry_id'
    ];

    public function freeEntry()
    {
        return $this->belongsTo('App\Models\FreeEntry');
    }
}
