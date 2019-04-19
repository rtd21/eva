<?php

namespace App\Http\Controllers;

use App\Models\FreeEntry;
use Illuminate\Http\Request;

class FreeEntryController extends Controller
{
    public function store(Request $request, $event_id)
    {
        $freeEntry = new FreeEntry;
        $freeEntry->fill($request->all());
        $freeEntry->event_id = $event_id;
        $freeEntry->save();
        return redirect()->back();
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


    public function destroy($event_id, $id)
    {
        $freeEntry = FreeEntry::find($id);
        $freeEntry->delete();
        return redirect()->back();
    }
}
