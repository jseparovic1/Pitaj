<?php

namespace Pitaj\Models;

use Pitaj\Models\ModelBase;

class Tag extends ModelBase
{
    /**
     * Find all questions associated with tag
     */
    public function questions()
    {
        return $this->belongsToMany(Question::class, 'question_tag');
    }
}
