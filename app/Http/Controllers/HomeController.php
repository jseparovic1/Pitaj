<?php

namespace Pitaj\Http\Controllers;

use Pitaj\Repositories\QuestionsRepository;

class HomeController extends Controller
{
    /**
     * @var QuestionsRepository
     */
    protected $questions;

    /**
     * HomeController constructor.
     * @param QuestionsRepository $questions
     */
    public function __construct(QuestionsRepository $questions)
    {
        $this->questions = $questions;
    }

    /**
     * Show questions and tags
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //get latest questions with answers
        $questions = $this->questions->latest();

        return view('question.index', compact('questions'));
    }
}
