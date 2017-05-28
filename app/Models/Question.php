<?php

namespace Pitaj\Models;

use Pitaj\Models\ModelBase;

class Question extends ModelBase
{
    //TODO implement created event on question

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

    public function createdForHuman()
    {
        return $this->created_at->diffForHumans();
    }

    public function scopePopular()
    {
        //TODO make popular scope
    }
}
