<?php

namespace Pitaj\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Pitaj\Models\ModelBase
 *
 * @mixin \Eloquent
 */
class ModelBase extends Model
{
    /**
     * Guarded attributes
     * @var array
     */
    protected $guarded = [];
}