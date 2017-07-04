<?php

namespace Pitaj\Models;

use Pitaj\Models\ModelBase;

/**
 * Pitaj\Models\Activation
 *
 * @property int $user_id
 * @property string $token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\Activation whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\Activation whereToken($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\Activation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Pitaj\Models\Activation whereUserId($value)
 * @mixin \Eloquent
 */
class Activation extends ModelBase
{
    /**
     * Models table
     *
     * @var string
     */
    protected $table = 'users_activation';
}
