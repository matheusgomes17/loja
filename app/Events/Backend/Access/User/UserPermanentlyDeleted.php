<?php

namespace PaperStore\Events\Backend\Access\User;

use PaperStore\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class UserPermanentlyDeleted
 * @package PaperStore\Events\Backend\Access\User
 */
class UserPermanentlyDeleted extends Event
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