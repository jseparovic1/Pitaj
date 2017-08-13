<?php

namespace Pitaj\Repositories;

use Pitaj\Models\Question;

class QuestionsRepository
{
    /*
     * Question model
     */
    protected $question;

    /**
     * Defines how many questions are shown on front page
     *
     * @var int
     */
    protected $questionLimit = 10;

    /**
     * How many related questions to fetch
     *
     * @var integer
     */
    protected $relatedLimit = 10;

    /**
     * QuestionsRepository constructor.
     * @param Question $question
     */
    public function __construct(Question $question)
    {
        $this->question = $question;
    }

    /**
     * Get latest questions with answers and tags so
     * there is no need to load id
     */
    public function findLatest()
    {
        return  $this->question
            ->with(['answers', 'tags', 'author'])
            ->orderBy('created_at', 'DESC')
            ->take($this->questionLimit)
            ->get();
    }

    /**
     * Find related questions for given question
     *
     * @param Question $source
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getRelated(Question $source)
    {
        $qustions = $this->question
            ->where([
                ['title', 'like', "%{$source->title}%"],
                ['id', '<>', "{$source->id}"]
                ])
            ->limit($this->relatedLimit)
            ->get();

        return $qustions;
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function findById($id)
    {
        return $this->question->with([
            'author',
            'tags',
            'answers' => function ($query) {
                $query->with(['votes', 'author']);
            }
        ])->findOrFail($id);
    }
}