<?php

namespace Pitaj\Repositories;

use Illuminate\Database\Eloquent\Builder;
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
     * Query that we built
     * @var Builder
     */
    protected $builder;

    public function __construct(Question $question)
    {
        $this->question = $question;
    }

    /**
     * Get latest questions with answers and tags so
     * there is no need to load id
     */
    public function latest()
    {
        return  $this->question
            ->with('answers')
            ->with('tags')
            ->latest()
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
        return $this->question
            ->where('title', 'like', "%{$source->title}%")
            ->limit($this->relatedLimit)
            ->get();
    }
}