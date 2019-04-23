<?php

namespace App\Http\Controllers\API;

use App\Models\Choice;
use App\Models\Event;
use App\Models\MultipleChoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MultipleChoiceController extends Controller
{
    public function update(Request $request, $id)
    {
        //дописать разграничение прав
        $multipleChoice = MultipleChoice::find($id);
        $multipleChoice->addVote($request);
        $multipleChoice->save();
        return response()->json([
            'status' => '200 OK'
        ]);
    }
}
