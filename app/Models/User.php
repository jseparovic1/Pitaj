<?php

namespace Pitaj\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Pitaj\Models\User
 */
class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    /*
     * Get activation token
     */
    public function activation()
    {
        return $this->hasOne(Activation::class);
    }

    /**
     * Get all user questions
     */
    public function questions()
    {
        return $this->hasMany(Question::class, 'author_id');
    }

    /**
     * Get all user answers
     */
    public function answers()
    {
        return $this->hasMany(Answer::class, 'author_id');
    }

    /**
     * Get all votes
     */
    public function votes()
    {
        return $this->hasMany(Vote::class, 'voter_id');
    }

    /**
     * Activate user
     */
    public function activate()
    {
        $this->activated = 1;
        $this->activation->token = '';
        $this->save();
    }

    /**
     * Publish new question with given tags
     *
     * @param $title
     * @param $body
     * @param $tags Tag
     * @return question id
     */
    public function publish($title, $body, $tags)
    {
        $question = $this->questions()->create([
            'title' => $title,
            'body' => $body,
            'slug' => str_slug($title)
        ]);

        foreach ($tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag->tag]);
            $question->tags()->attach($tag);
        }

        return $question->id;
    }

    /**
     * Vote for answer
     *
     * @param $answer
     * @param string $type
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function vote($answer, $type = 'up')
    {
        if ($type == 'up') {
            return $this->votes()->create([
                'answer_id' => $answer->id,
                'vote_value' => 1,
            ]);
        }

        return $this->votes()->create([
            'answer_id' => $answer->id,
            'vote_value' => -1,
        ]);
    }

    /**
     * Return vote if user has voted to answer
     *
     * @param $answer
     * @return mixed
     */
    public function getVote($answer)
    {
        return $this->votes()->where([
            'voter_id' => $this->id,
            'answer_id' => $answer->id
        ])->first();
    }

    public function hasVoted($answer, $type)
    {
        $vote = $this->getVote($answer);
        if (! $vote instanceof Vote) {
            return false;
        }
        if ($vote->vote_value === 1 && $type === "up") {
            return true;
        }
        if ($vote->vote_value === -1 && $type === "down") {
            return true;
        }
        return false;
    }

    public function profileUrl()
    {
        return "/profile/$this->id/".str_slug($this->name);
    }
}
