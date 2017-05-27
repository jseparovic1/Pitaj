<?php

namespace Pitaj\Http\Controllers;

use Illuminate\Http\Request;
use Pitaj\Models\Question;
use Pitaj\Models\Tag;

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
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'question' => 'required|string',
        ]);

        $tags =  $request->input('tags');
        $question = $request->input('question');

        $tags = json_decode($tags);
        $question = new Question(['title' => $question, 'views' => 123]);

        //publish question
        $request->user()->publish($question , $tags);

        //TODO fire question created event
        return "fuck yeah!";
    }
}
