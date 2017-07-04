<?php

namespace Pitaj\Models;

use Pitaj\Models\ModelBase;

/**
 * Pitaj\Models\Tag
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Pitaj\Models\Question[] $questions
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\Tag whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\Tag whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\Tag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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

    /**
     * Get tags with most questions
     *
     * @param $count
     * @return mixed
     */
    public static function popular($count)
    {
        return self::withCount('questions')
            ->orderBy('questions_count', 'desc')
            ->take($count)
            ->get();
    }
}
