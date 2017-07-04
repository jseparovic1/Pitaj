<?php

namespace Pitaj\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Pitaj\Models\User
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $name
 * @property bool $activated
 * @property string $avatarUrl
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Pitaj\Models\Activation $activation
 * @property-read \Illuminate\Database\Eloquent\Collection|\Pitaj\Models\Answer[] $answers
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Pitaj\Models\Question[] $questions
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\User whereActivated($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\User whereAvatarUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
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
     * Activate user
     */
    public function activate()
    {
        //We can acces properties of model and his relationship
        //with dynamic properties
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
}
