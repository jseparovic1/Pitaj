<?php

namespace Pitaj\Http\Controllers\Question;

use Pitaj\Http\Controllers\Controller;
use Pitaj\Models\Question;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        $query = $request->get('query');
        $questions = Question::where('title', 'like', "%$query%")->limit(5)->get();

        return response()->json($questions, 200);
    }
}