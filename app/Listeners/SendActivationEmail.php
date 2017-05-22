<?php

namespace Pitaj\Listeners;

use Mail;
use Pitaj\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Pitaj\Mail\Activation;

class SendActivationEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {

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

        Mail::to($user)
            ->queue(new Activation($user));
    }
}
