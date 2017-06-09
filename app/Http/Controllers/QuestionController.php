<?php

namespace Pitaj\Http\Controllers;

use Illuminate\Http\Request;
use Pitaj\Models\Question;
use Pitaj\Repositories\QuestionsRepository;

class QuestionController extends Controller
{
    /**
     * @var QuestionsRepository
     */
    protected $questionsRepository;

    /**
     * QuestionController constructor.
     * @param QuestionsRepository $questionsRepository
     */
    public function __construct(QuestionsRepository $questionsRepository)
    {
        //set auth middleware so only authenticated user can access this page
        $this->middleware('auth')->except('show');
        $this->questionsRepository = $questionsRepository;
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
            'title' => 'required|max:200',
            'body' => 'string|max:2000',
            'tags' => 'required'
        ]);

        $tags =  $request->input('tags');
        $title = $request->input('title');
        $body = $request->input('body') ?? '';

        $tags = json_decode($tags);

        //publish question
        $questionId = $request->user()->publish($title, $body, $tags);
        return $questionId;
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

        //get related questions
        $related = $this->questionsRepository->getRelated($question);

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

        return view('question.show' , compact('question', 'related'));
    }

    /**
     * Delete question
     *
     * @param Question $question
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Question $question)
    {
        $this->authorize('update', $question);
        $question->answers()->delete();
        $question->delete();

        return redirect()->route('home');
    }
}
