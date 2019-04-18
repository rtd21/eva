<?php

namespace App\Http\Controllers\API;

use App\Models\Choice;
use App\Models\MultipleChoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MultipleChoiceController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request, $event_id)
    {
        $multipleChoice = new MultipleChoice();
        $multipleChoice->fill($request->all());
        $multipleChoice->event_id = $event_id;
        $multipleChoice->setChoices($request);
        return redirect()->back();
    }

    public function show($id)
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
