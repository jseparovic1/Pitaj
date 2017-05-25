<?php

namespace Pitaj\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
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
        $question = $request->input('question');

        dd($question);
    }
}
