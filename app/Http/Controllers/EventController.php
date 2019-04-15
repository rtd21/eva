<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    public function index()
    {

    }

    public function store(Request $request)
    {
        $event = new Event;
        $event->fill($request->all());
        $characters = array_merge(range('A','Z'));
        $event->code = $characters[rand(0, count($characters) - 1)].rand(100, 999);
        $event->admin_id = Auth::id();
        $event->save();
        return redirect()->route('admin.index');
    }

    public function show($id)
    {
        $event = Event::find($id);
        return view('event.event')->with([
            'event' => $event
        ]);
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event->update($request->all());
        $event->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect()->back();
    }
}
