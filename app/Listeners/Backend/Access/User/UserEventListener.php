<?php

namespace PaperStore\Listeners\Backend\Access\User;

/**
 * Class UserEventListener
 * @package PaperStore\Listeners\Backend\Access\User
 */
class UserEventListener
{
	/**
	 * @var string
	 */
	private $history_slug = 'User';

	/**
	 * @param $event
	 */
	public function onCreated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.backend.users.created") <strong>'.$event->user->name.'</strong>',
			$event->user->id,
			'plus',
			'bg-green'
		);
	}

	/**
	 * @param $event
	 */
	public function onUpdated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.backend.users.updated") <strong>'.$event->user->name.'</strong>',
			$event->user->id,
			'save',
			'bg-aqua'
		);
	}

	/**
	 * @param $event
	 */
	public function onDeleted($event) {
		history()->log(
			$this->history_slug,
			'trans("history.backend.users.deleted") <strong>'.$event->user->name.'</strong>',
			$event->user->id,
			'trash',
			'bg-maroon'
		);
	}

	/**
	 * @param $event
	 */
	public function onRestored($event) {
		history()->log(
			$this->history_slug,
			'trans("history.backend.users.restored") <strong>'.$event->user->name.'</strong>',
			$event->user->id,
			'refresh',
			'bg-aqua'
		);
	}

	/**
	 * @param $event
	 */
	public function onPermanentlyDeleted($event) {
		history()->log(
			$this->history_slug,
			'trans("history.backend.users.permanently_deleted") <strong>'.$event->user->name.'</strong>',
			$event->user->id,
			'trash',
			'bg-maroon'
		);
	}

	/**
	 * @param $event
	 */
	public function onPasswordChanged($event) {
		history()->log(
			$this->history_slug,
			'trans("history.backend.users.changed_password") <strong>'.$event->user->name.'</strong>',
			$event->user->id,
			'lock',
			'bg-blue'
		);
	}

	/**
	 * @param $event
	 */
	public function onDeactivated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.backend.users.deactivated") <strong>'.$event->user->name.'</strong>',
			$event->user->id,
			'times',
			'bg-yellow'
		);
	}

	/**
	 * @param $event
	 */
	public function onReactivated($event) {
		history()->log(
			$this->history_slug,
			'trans("history.backend.users.reactivated") <strong>'.$event->user->name.'</strong>',
			$event->user->id,
			'check',
			'bg-green'
		);
	}

	/**
	 * Register the listeners for the subscriber.
	 *
	 * @param  \Illuminate\Events\Dispatcher  $events
	 */
	public function subscribe($events)
	{
		$events->listen(
			\PaperStore\Events\Backend\Access\User\UserCreated::class,
			'PaperStore\Listeners\Backend\Access\User\UserEventListener@onCreated'
		);

		$events->listen(
			\PaperStore\Events\Backend\Access\User\UserUpdated::class,
			'PaperStore\Listeners\Backend\Access\User\UserEventListener@onUpdated'
		);

		$events->listen(
			\PaperStore\Events\Backend\Access\User\UserDeleted::class,
			'PaperStore\Listeners\Backend\Access\User\UserEventListener@onDeleted'
		);

		$events->listen(
			\PaperStore\Events\Backend\Access\User\UserRestored::class,
			'PaperStore\Listeners\Backend\Access\User\UserEventListener@onRestored'
		);

		$events->listen(
			\PaperStore\Events\Backend\Access\User\UserPermanentlyDeleted::class,
			'PaperStore\Listeners\Backend\Access\User\UserEventListener@onPermanentlyDeleted'
		);

		$events->listen(
			\PaperStore\Events\Backend\Access\User\UserPasswordChanged::class,
			'PaperStore\Listeners\Backend\Access\User\UserEventListener@onPasswordChanged'
		);

		$events->listen(
			\PaperStore\Events\Backend\Access\User\UserDeactivated::class,
			'PaperStore\Listeners\Backend\Access\User\UserEventListener@onDeactivated'
		);

		$events->listen(
			\PaperStore\Events\Backend\Access\User\UserReactivated::class,
			'PaperStore\Listeners\Backend\Access\User\UserEventListener@onReactivated'
		);
	}
}