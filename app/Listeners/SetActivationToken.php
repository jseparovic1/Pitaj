<?php

namespace Pitaj\Listeners;

use Pitaj\Repositories\ActivationRepository;
use Pitaj\Events\Registered;

class SetActivationToken
{
    /** @var  ActivationRepository */
    protected $activationRepository;

    /**
     * Create the event listener.
     * @param ActivationRepository $activationRepository
     */
    public function __construct(ActivationRepository $activationRepository)
    {
        $this->activationRepository = $activationRepository;
    }

    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $user = $event->getUser();
        $user->activation()->token = $this->activationRepository->makeToken();
        $user->save();
    }
}
