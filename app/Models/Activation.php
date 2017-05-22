<?php

namespace Pitaj\Models;

use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{

    protected $table = 'users_activation';

    /**
     * The attributes that are guarded.
     *
     * @var array
     */
    protected $guarded = [];
}
