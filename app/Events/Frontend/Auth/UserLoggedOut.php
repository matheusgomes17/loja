<?php

namespace PaperStore\Events\Frontend\Auth;

use PaperStore\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class UserLoggedOut
 * @package PaperStore\Events\Frontend\Auth
 */
class UserLoggedOut extends Event
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