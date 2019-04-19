<?php

namespace App\Http\Controllers;

use App\Models\TagCloud;
use Illuminate\Http\Request;

class TagCloudController extends Controller
{
    public function store(Request $request, $event_id)
    {
        $tagCloud = new TagCloud;
        $tagCloud->fill($request->all());
        $tagCloud->event_id = $event_id;
        $tagCloud->save();
        return redirect()->back();
    }

    public function update(Request $request, $event_id, $id)
    {
        $tagCloud = TagCloud::find($id);
        $tagCloud->update([
            'question' => $request->question
        ]);
        $tagCloud->setParams($request);
        $tagCloud->save();
        return redirect()->back();
    }

    public function destroy($event_id, $id)
    {
        $tagCloud = TagCloud::find($id);
        $tagCloud->delete();
        return redirect()->back();
    }
}
