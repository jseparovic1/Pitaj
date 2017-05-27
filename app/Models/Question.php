<?php

namespace Pitaj\Models;

use Carbon\Carbon;
use Pitaj\Models\ModelBase;
use Pitaj\Models\Tag;

class Question extends ModelBase
{
    //TODO implement this
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $events = [
        'created' => '',
    ];

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
