<?php

namespace Pitaj\Http\Controllers;

use Pitaj\Models\Tag;

class TagController extends Controller
{
    /**
     * Show questions by tag name.
     * This action uses route model binding
     *
     * @param Tag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Tag $tag)
    {
        $questions = $tag->questions()
            ->limit(10)
            ->get();

        $tagName = $tag->name;

        return view('question.showByTag', compact('questions' , 'tagName'));
    }
}
