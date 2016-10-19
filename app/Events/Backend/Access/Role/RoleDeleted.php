<?php

namespace PaperStore\Events\Backend\Access\Role;

use PaperStore\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class RoleDeleted
 * @package PaperStore\Events\Backend\Access\Role
 */
class RoleDeleted extends Event
{
	use SerializesModels;

	/**
	 * @var $role
	 */
	public $role;

	/**
	 * @param $role
	 */
	public function __construct($role)
	{
		$this->role = $role;
	}
}