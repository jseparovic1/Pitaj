<?php
namespace Pitaj\Presenters;

use Pitaj\Models\Answer;
use Pitaj\Models\Question;
use Pitaj\Models\User;

class UserProfilePresenter
{
    /**
     * @var User
     */
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function questions()
    {
        return Question::where('author_id', $this->user->id)->get();
    }

    public function answers()
    {
        return Answer::where('author_id', $this->user->id)->get();
    }

    public function userName()
    {
        return $this->user->name;
    }

    public function description()
    {
        return $this->user->description;
    }

    public function user()
    {
        return $this->user;
    }
}