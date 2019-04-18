<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index($id)
    {
    }

    public function destroy($id)
    {
        //
    }

    public function reply(Request $request, $event_id, $question_id)
    {
        $question = Question::find($question_id);
        $question->addReply($request->reply);
        return redirect()->back();
    }
}
