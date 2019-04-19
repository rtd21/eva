<?php

namespace App\Http\Controllers\API;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RatingController extends Controller
{
    public function index($event_id)
    {
        $ratings = Rating::where('event_id', $event_id)->get();
        return response()->json([
            'ratings' => $ratings
        ]);
    }

    public function addVote(Request $request)
    {
    }
}
