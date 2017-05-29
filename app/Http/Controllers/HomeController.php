<?php

namespace Pitaj\Http\Controllers;

use Illuminate\Http\Request;
use Pitaj\Models\Question;
use Pitaj\Models\Tag;

class HomeController extends Controller
{
    /**
     * Defines how many questions are shown on front page
     *
     * @var int
     */
    protected $questionLimit = 10;

    /**
     * Number of tags show on front page
     * @var int
     */
    protected $tagLimit = 5;
    
    /**
     * Show questions and tags
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //get latest questions with answers
        $questions = Question::with('answers')
            ->with('tags')
            ->latest()
            ->take($this->questionLimit)
            ->get();

        //popular tags
        $popularTags = Tag::withCount('questions')
            ->orderBy('questions_count', 'desc')
            ->limit($this->tagLimit)
            ->get();

        return view('home', compact('questions', 'popularTags'));
    }
}
