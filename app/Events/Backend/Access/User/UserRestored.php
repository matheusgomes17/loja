<?php

namespace PaperStore\Events\Backend\Access\User;

use PaperStore\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class UserRestored
 * @package PaperStore\Events\Backend\Access\User
 */
class UserRestored extends Event
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