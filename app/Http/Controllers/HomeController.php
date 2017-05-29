<?php

namespace Pitaj\Http\Controllers;

use Illuminate\Http\Request;
use Pitaj\Models\Question;
use Pitaj\Models\Tag;

class HomeController extends Controller
{
    /**
     * Show questions and tags
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $questions = Question::latest()->get()->take(10);
        $tags = Tag::withCount('questions')
            ->orderBy('questions_count', 'desc')
            ->limit(5)
            ->get();

        return view('home', compact('questions', 'tags'));
    }
}
