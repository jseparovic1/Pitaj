<?php

namespace Pitaj\Http\Controllers;

use Illuminate\Http\Request;
use Pitaj\Models\Question;

class HomeController extends Controller
{
    public function index(Question $question)
    {
        $questions = $question::latest()->get();
        return view('home', compact('questions'));
    }
}
