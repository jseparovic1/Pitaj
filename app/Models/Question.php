<?php

namespace Pitaj\Models;

use Illuminate\Database\Eloquent\Model;
use Pitaj\Models\Tag;

class Question extends Model
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
        return $this->belongsTo(User::class, 'id', 'author_id');
    }
}
