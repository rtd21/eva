<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleBlock\StoreScheduleBlock;
use App\Http\Requests\ScheduleBlock\UpdateScheduleBlock;
use App\Models\ScheduleBlock;
use Illuminate\Http\Request;

class ScheduleBlockController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
    }

    public function edit($event_id, $id)
    {
        $block = ScheduleBlock::find($id);
        $event = $block->event()->first();
        return view('schedule.edit')->with([
            'block' => $block,
            'event' => $event
        ]);
    }

    public function store(StoreScheduleBlock $request, $id)
    {
        $block = new ScheduleBlock;
        $block->event_id = $id;
        $block->fill($request->all());
        $block->save();
        return redirect()->back();
    }


    public function update(UpdateScheduleBlock $request, $event_id, $id)
    {
        $block = ScheduleBlock::find($id);
        $block->update($request->all());
        $block->save();
        return redirect()->route('event.show', $event_id);
    }

    public function destroy($event_id, $id)
    {
        $block = ScheduleBlock::find($id);
        $block->delete();
        return redirect()->back();
    }
}
