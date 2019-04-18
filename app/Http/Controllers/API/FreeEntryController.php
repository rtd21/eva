<?php

namespace App\Http\Controllers\API;

use App\Models\FreeEntry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FreeEntryController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request, $event_id)
    {
        $freeEntry = new FreeEntry;
        $freeEntry->fill($request->all());
        $freeEntry->event_id = $event_id;
        $freeEntry->save();
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $event_id, $id)
    {
        $freeEntry = FreeEntry::find($id);
        $freeEntry->update([
            'question' => $request->question
        ]);
        $freeEntry->setParams($request);
        $freeEntry->save();
        return redirect()->back();
    }


    public function destroy($id)
    {
        //
    }
}
