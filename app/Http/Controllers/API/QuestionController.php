<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\Question\StoreQuestion;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function index()
    {
        //
    }

    public function store(StoreQuestion $request)
    {
        $question = new Question;
        $question->fill($request->all());
        $question->save();
        return response()->json([
            'status' => '200 OK'
        ]);
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
        $question = Question::find($id);
        $question->delete();
        return response()->json([
            'status' => '200 OK'
        ]);
    }
}
