<?php

namespace Pitaj\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Pitaj\Models\User;

class Activation extends Mailable implements ShouldQueue
{

    use Queueable, SerializesModels;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 5;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 20;

    /**
     * Route to activate account
     * @var string
     */
    protected $activationRoute;

    /**
     * Activation url
     * @var
     */
    public $activationUrl;

    /**
     * @var User
     */
    public $user;

    /**
     * Create a new message instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->activationRoute = route('register.activate');
        $this->activationUrl = $this->makeUrl();
    }

    protected function makeUrl()
    {
        return $this->activationRoute
            ."?q=". $this->user->activation()->first()->token
            ."&u=". $this->user->id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.auth.activation');
    }
}
