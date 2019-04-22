<?php

namespace App\Http\Controllers\API;

use App\Models\FreeEntry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FreeEntryController extends Controller
{
    public function update(Request $request, $id)
    {
        //дописать разграничение прав
        $freeEntry = FreeEntry::find($id);
        $freeEntry->addVote($request);
        $freeEntry->save();
        return response()->json([
            'status' => '200 OK'
        ]);
    }
}
