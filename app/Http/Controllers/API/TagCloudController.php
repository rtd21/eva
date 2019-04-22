<?php

namespace App\Http\Controllers\API;

use App\Models\TagCloud;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagCloudController extends Controller
{
    public function update(Request $request, $id)
    {
        //дописать разграничение прав
        $tagCloud = TagCloud::find($id);
        $tagCloud->addVote($request);
        $tagCloud->save();
        return response()->json([
            'status' => '200 OK'
        ]);
    }
}
