<?php

namespace PaperStore\Listeners\Frontend\Auth;

/**
 * Class UserEventListener
 * @package PaperStore\Listeners\Frontend\Auth
 */
class UserEventListener
{

	/**
	 * @param $event
	 */
	public function onLoggedIn($event) {
		\Log::info('User Logged In: ' . $event->user->name);
	}

	/**
	 * @param $event
	 */
	public function onLoggedOut($event) {
		\Log::info('User Logged Out: ' . $event->user->name);
	}

	/**
	 * @param $event
	 */
	public function onRegistered($event) {
		\Log::info('User Registered: ' . $event->user->name);
	}

	/**
	 * @param $event
	 */
	public function onConfirmed($event) {
		\Log::info('User Confirmed: ' . $event->user->name);
	}

	/**
	 * Register the listeners for the subscriber.
	 *
	 * @param  \Illuminate\Events\Dispatcher  $events
	 */
	public function subscribe($events)
	{
		$events->listen(
			\PaperStore\Events\Frontend\Auth\UserLoggedIn::class,
			'PaperStore\Listeners\Frontend\Auth\UserEventListener@onLoggedIn'
		);

		$events->listen(
			\PaperStore\Events\Frontend\Auth\UserLoggedOut::class,
			'PaperStore\Listeners\Frontend\Auth\UserEventListener@onLoggedOut'
		);

		$events->listen(
			\PaperStore\Events\Frontend\Auth\UserRegistered::class,
			'PaperStore\Listeners\Frontend\Auth\UserEventListener@onRegistered'
		);

		$events->listen(
			\PaperStore\Events\Frontend\Auth\UserConfirmed::class,
			'PaperStore\Listeners\Frontend\Auth\UserEventListener@onConfirmed'
		);
	}
}