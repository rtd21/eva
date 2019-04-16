<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Speaker;
use Illuminate\Http\Request;

class SpeakerController extends Controller
{

    public function index()
    {
        //
    }

    public function store(Request $request, $id)
    {
        $speaker = new Speaker;
        $speaker->event_id = $id;
        $speaker->fill($request->all());
        $speaker->save();
        return redirect()->back();
    }

    public function show($event_id, $id)
    {
        $speaker = Speaker::find($id);
        return view('speaker.show')->with([
            'speaker' => $speaker,
        ]);
    }

    public function update(Request $request, $event_id, $id)
    {
        $speaker = Speaker::find($id);
        $speaker->update($request->all());
        $speaker->save();
        return redirect()->back();
    }

    public function destroy($event_id, $id)
    {
        $speaker = Speaker::find($id);
        $speaker->delete();
        return redirect()->back();
    }
}
