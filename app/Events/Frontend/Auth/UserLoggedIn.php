<?php

namespace PaperStore\Events\Frontend\Auth;

use PaperStore\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class UserLoggedIn
 * @package PaperStore\Events\Frontend\Auth
 */
class UserLoggedIn extends Event
{
    use SerializesModels;

    /**
     * @var $user
     */
    public $user;

    /**
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }
}