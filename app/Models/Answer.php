<?php

namespace Pitaj\Models;

/**
 * Pitaj\Models\Answer
 *
 * @property int $id
 * @property string $body
 * @property int $votes
 * @property int $author_id
 * @property int $question_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Pitaj\Models\User $author
 * @property-read \Pitaj\Models\Question $question
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\Answer whereAuthorId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\Answer whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\Answer whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\Answer whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\Answer whereQuestionId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\Answer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\Answer whereVotes($value)
 * @mixin \Eloquent
 */
class Answer extends ModelBase
{
    protected $appends = ['score'];

    /**
     * Get question on witch answer is posted
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Get answer author
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    /**
     * Get answer votes
     */
    public function votes()
    {
        return $this->hasMany(Vote::class, 'answer_id');
    }

    /**
     * Calculate vote score
     * @return mixed
     */
    public function getScoreAttribute()
    {
        return $this->votes->sum('vote_value');
    }
}
