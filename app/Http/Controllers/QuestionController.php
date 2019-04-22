<?php

namespace App\Http\Controllers;

use App\Http\Requests\Question\ReplyQuestion;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function destroy($event_id, $id)
    {
        $question = Question::find($id);
        $question->delete();
        return redirect()->back();
    }

    public function reply(ReplyQuestion $request, $event_id, $question_id)
    {
        $question = Question::find($question_id);
        $question->addReply($request->reply);
        return redirect()->back();
    }
}
