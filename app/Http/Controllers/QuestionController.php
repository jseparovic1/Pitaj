<?php

namespace Pitaj\Http\Controllers;

use Illuminate\Http\Request;
use Pitaj\Models\Question;
use Pitaj\Models\Tag;

class QuestionController extends Controller
{
    /**
     * QuestionController constructor.
     */
    public function __construct()
    {
        //set auth middleware so only authenticated user can access this page
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

        //TODO set json content type when sending ajax and avoid this
        $tags = json_decode($tags);

        $slug = str_slug($question);
        $question = new Question(['title' => $question, 'slug' => $slug]);

        //publish question
        $request->user()->publish($question, $tags);
    }
}
