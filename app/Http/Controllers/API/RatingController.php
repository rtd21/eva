<?php

namespace App\Http\Controllers\API;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RatingController extends Controller
{
    public function update(Request $request, $id)
    {
        //дописать разграничение прав
        $rating = Rating::find($id);
        $rating->addVote($request);
        $rating->save();
        return response()->json([
            'status' => '200 OK'
        ]);
    }
}
