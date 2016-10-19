<?php

namespace PaperStore\Events\Frontend\Auth;

use PaperStore\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class UserConfirmed
 * @package PaperStore\Events\Frontend\Auth
 */
class UserConfirmed extends Event
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