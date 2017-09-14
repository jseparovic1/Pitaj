<?php

namespace Pitaj\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Pitaj\Models\User;
use Pitaj\Models\Question;

class QuestionPolicy
{
    use HandlesAuthorization;

    public function before()
    {
        //some condition for admin
    }

    /**
     * Policy for question deleting and updating
     *
     * @param $user
     * @param $question
     * @return bool
     */
    public function update(User $user, Question $question)
    {
        return $user->id == $question->author_id;
    }
}
