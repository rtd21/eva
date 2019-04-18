<?php

namespace App\Http\Controllers\API;

use App\Models\TagCloud;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagCloudController extends Controller
{
    public function index()
    {
    }

    public function store(Request $request, $event_id)
    {
        $tagCloud = new TagCloud;
        $tagCloud->fill($request->all());
        $tagCloud->event_id = $event_id;
        $tagCloud->save();
        return redirect()->back();
    }

    public function show($id)
    {
        //
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

    public function destroy($id)
    {
        //
    }
}
