<?php

namespace App\Http\Controllers;

use App\Http\Requests\Rating\StoreRating;
use App\Http\Requests\Rating\UpdateRating;
use App\Models\Rating;

class RatingController extends Controller
{
    public function store(StoreRating $request, $event_id)
    {
        $rating = new Rating;
        $rating->fill($request->all());
        $rating->event_id = $event_id;
        $rating->save();
        return redirect()->back();
    }

    public function update(UpdateRating $request, $event_id, $id)
    {
        $rating = Rating::find($id);
        $rating->update([
            'question' => $request->question
        ]);
        $rating->setParams($request);
        $rating->save();
        return redirect()->back();
    }

    public function destroy($event_id, $id)
    {
        $rating = Rating::find($id);
        $rating->delete();
        return redirect()->back();
    }
}
