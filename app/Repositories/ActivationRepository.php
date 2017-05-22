<?php

namespace Pitaj\Repositories;

use Pitaj\Models\Activation;

class ActivationRepository
{
    /*
     * Activation table
     */
    protected $activation;

    public function __construct(Activation $activation)
    {
        $this->activation = $activation;
    }

    /**
     * Make activation token
     *
     * @return string
     */
    public function makeToken()
    {
        return hash_hmac('sha256', str_random(40), config('app.key'));
    }
}