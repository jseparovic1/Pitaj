<?php

namespace Pitaj\Listeners;

use Pitaj\Events\Registered;
use Pitaj\Repositories\ActivationRepository;

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
        $user->activation()->create([
            'token' => $this->activationRepository->makeToken()
        ]);
    }
}
