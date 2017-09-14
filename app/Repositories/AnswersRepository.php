<?php

namespace Pitaj\Repositories;

use Pitaj\Models\Answer;
use Pitaj\Models\User;

class AnswersRepository
{
    /*
     * Answer model
     */
    protected $model;

    /**
     * QuestionsRepository constructor.
     * @param Answer $answer
     */
    public function __construct(Answer $answer)
    {
        $this->model = $answer;
    }

    /**
     * @param $user
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function findByUser(User $user)
    {
        return $this->model->with([
            'votes',
        ])
            ->where('author_id', '=', $user->id)
            ->findOrFail($user->id);
    }
}