<?php

namespace Pitaj\Models;

use Pitaj\Models\ModelBase;

/**
 * Pitaj\Models\Question
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $body
 * @property int $author_id
 * @property int $views
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Pitaj\Models\Answer[] $answers
 * @property-read \Pitaj\Models\User $author
 * @property-read \Illuminate\Database\Eloquent\Collection|\Pitaj\Models\Tag[] $tags
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\Question popular()
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\Question whereAuthorId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\Question whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\Question whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\Question whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\Question whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\Question whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\Question whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\Question whereViews($value)
 * @mixin \Eloquent
 */
class Question extends ModelBase
{
    /**
     * Get all tags associated with question
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'question_tag');
    }

    /**
     * Get question author
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    /**
     * All answers for selected question
     */
    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id');
    }

    /**
     * Format created_at in human readable format, like 10 days ago
     */
    public function createdForHuman()
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Get most popular questions
     */
    public function scopePopular()
    {
        //TODO make popular scope
    }
}
