<?php

namespace Pitaj\Models;

use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{

    protected $table = 'users_activation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'token', 'created_at',
    ];

    protected function user()
    {
        $this->belongsTo(User::class, 'user_id', 'id');
    }
}
