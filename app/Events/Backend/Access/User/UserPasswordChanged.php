<?php

namespace PaperStore\Events\Backend\Access\User;

use PaperStore\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class UserPasswordChanged
 * @package PaperStore\Events\Backend\Access\User
 */
class UserPasswordChanged extends Event
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