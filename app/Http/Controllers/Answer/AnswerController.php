<?php

namespace Pitaj\Http\Controllers\Answer;

use Illuminate\Http\Request;
use Pitaj\Http\Controllers\Controller;
use Pitaj\Models\Answer;
use Pitaj\Models\Question;

class AnswerController extends Controller
{
    /**
     * Add new answer to question
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $id)
    {
        $this->validate($request , [
            'body' => 'required|max:600'
        ]);

        $question = Question::findOrFail($id);

        $question->answers()->create([
            'body' => $request->input('body'),
            'author_id' => $request->user()->id
        ]);

        return back();
    }
}