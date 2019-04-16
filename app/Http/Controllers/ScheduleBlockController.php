<?php

namespace App\Http\Controllers;

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

    public function store(Request $request, $id)
    {
        $block = new ScheduleBlock;
        $block->event_id = $id;
        $block->fill($request->all());
        $block->save();
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
