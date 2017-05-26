<?php

namespace Pitaj\Http\Controllers;

use Illuminate\Http\Request;
use Pitaj\Models\Question;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show question form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showForm()
    {
        return view('question.add');
    }

    /**
     * Store question
     *
     * @param Request $request
     * @param Question $question
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'question' => 'required|string|max:200',
            'chips' => 'required|size:1'
        ]);
        $body = $request->input('question');
        $tags = $request->input('chips');

        $question = new Question();
        $question->body = $body;

        foreach ($tags as $tag) {
            $question->tags()->attach($tag);
        }

        $user = $request->user();
        $user->createQuestion();
    }
}
