<?php

namespace Pitaj\Models;

/**
 * Pitaj\Models\Answer
 */
class Answer extends ModelBase
{
    protected $appends = ['score'];

    protected $hidden = ['score'];
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
