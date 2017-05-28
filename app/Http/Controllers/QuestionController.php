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
            'question' => 'required|max:200',
            'tags' => 'required'
        ]);

        $tags =  $request->input('tags');
        $title = $request->input('question');

        //TODO set json content type when sending ajax and avoid this
        $tags = json_decode($tags);

        //publish question
        $request->user()->publish($title, $tags);
    }
}
