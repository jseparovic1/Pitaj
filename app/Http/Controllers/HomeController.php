<?php

namespace Pitaj\Http\Controllers;

use Pitaj\Repositories\QuestionsRepository;

class HomeController extends Controller
{
    /**
     * Show questions and tags
     * @param QuestionsRepository $questions
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(QuestionsRepository $questions)
    {
        //get latest questions with answers
        $questions = $questions->findLatest();

        return view('question.index', compact('questions'));
    }
}
