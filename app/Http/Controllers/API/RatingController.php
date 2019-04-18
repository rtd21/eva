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

    public function store(Request $request, $event_id)
    {
        $rating = new Rating;
        $rating->fill($request->all());
        $rating->event_id = $event_id;
        $rating->save();
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $event_id, $id)
    {
        $rating = Rating::find($id);
        $rating->update([
            'question' => $request->question
        ]);
        $rating->setParams($request);
        $rating->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addVote(Request $request, $id)
    {
        $rating = Rating::find($id);
        $rating->addVote($request);
    }
}
