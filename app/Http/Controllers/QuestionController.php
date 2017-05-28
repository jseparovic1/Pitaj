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
        $this->middleware('auth')->except('show');
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

    /**
     * Show single question
     *
     * @param $id
     * @param null $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show($id, $slug = null)
    {
        $question = Question::findOrFail($id);

        //question is hit so increase its views
        $question->views++;
        $question->save();

        //if slug not provided redirect it to route with slug
        if (empty($slug)) {
            return redirect()->route('question.single', [
                'id' => $id,
                'slug' => $question->slug
            ]);
        }

        return view('question.show' , compact('question'));
    }

    /**
     * Add new answer to question
     *
     * @param Request $request
     * @param $id question id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addAnswer(Request $request, $id)
    {
        $this->validate($request , [
            'body' => 'required|max:300'
        ]);

       $question = Question::findOrFail($id);

       $question->answers()->create([
            'body' => $request->input('body'),
            'author_id' => $request->user()->id
       ]);

       return back();
    }
}
