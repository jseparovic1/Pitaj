<?php

namespace Pitaj\Models;

class Answer extends ModelBase
{
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
}
