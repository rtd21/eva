<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagCloud\StoreTagCloud;
use App\Http\Requests\TagCloud\UpdateTagCloud;
use App\Models\TagCloud;

class TagCloudController extends Controller
{
    public function store(StoreTagCloud $request, $event_id)
    {
        $tagCloud = new TagCloud;
        $tagCloud->fill($request->all());
        $tagCloud->event_id = $event_id;
        $tagCloud->save();
        return redirect()->back();
    }

    public function update(UpdateTagCloud $request, $event_id, $id)
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
