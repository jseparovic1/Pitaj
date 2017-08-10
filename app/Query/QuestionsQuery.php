<?php
namespace Pitaj\Query;

use Pitaj\Models\Question;

class QuestionsQuery
{
    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function findById($id)
    {
        return Question::with([
            'author',
            'tags',
            'answers' => function ($query) {
                $query->with(['votes', 'author']);
            }
        ])->findOrFail($id);
    }
}