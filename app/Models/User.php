<?php

namespace Pitaj\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
     * Activate user
     */
    public function activate()
    {
        $this->activated = 1;
        $this->activation()->first()->token = '';
        $this->save();
    }

    /**
     * Publish new question with given tags
     *
     * @param $question Question
     * @param $tags Tag
     */
    public function publish($question, $tags)
    {
        $this->questions()->save($question);
        foreach ($tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag->tag]);
            $question->tags()->attach($tag);
        }
    }
}
