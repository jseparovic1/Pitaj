<?php

namespace Pitaj\Models;

use Pitaj\Models\ModelBase;

class Tag extends ModelBase
{
    /**
     * Use column name for route model biding
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'name';
    }

    /**
     * Find all questions associated with tag
     */
    public function questions()
    {
        return $this->belongsToMany(Question::class, 'question_tag');
    }
}
