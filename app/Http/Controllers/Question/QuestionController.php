<?php

namespace Pitaj\Http\Controllers\Question;

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Pitaj\Http\Controllers\Controller;
use Pitaj\Models\Question;
use Pitaj\Repositories\QuestionsRepository;

class QuestionController extends Controller
{
    /**
     * @var QuestionsRepository
     */
    protected $questionsRepository;

    /**
     * @var
     */
    protected $app;

    /**
     * QuestionController constructor.
     * @param QuestionsRepository $questionsRepository
     * @param Application $app
     */
    public function __construct(QuestionsRepository $questionsRepository, Application $app)
    {
        //set auth middleware so only authenticated user can access this page
        $this->middleware('auth')->except('show');
        $this->questionsRepository = $questionsRepository;
        $this->app = $app;
    }

    /**
     * Show question form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
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
        $purifier = $this->app->make('purifier');

        $tags =  $request->input('tags');
        $title = $request->input('title');
        $body = $purifier->clean($request->input('body') ?? '');
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
        $question = $this->questionsRepository->findById($id);
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
     * Show edit form
     * @param Question $question
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Question $question)
    {
        $this->authorize('update', $question);
        return view('question.edit', compact('question'));
    }

    /**
     * Update given question
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request)
    {
        $question = Question::findOrFail($id);
        $this->authorize('update', $question);

        $body = $request->get('body');
        $title = $request->get('title') ?? $question->title;
        Question::where('id', $id)->update([
            'body' => $body,
            'title' => $title
        ]);

        if ($request->isXmlHttpRequest()) {
            return response()->json("success");
        }

        return redirect()->route('question.single', ['id' => $question->id]);
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
