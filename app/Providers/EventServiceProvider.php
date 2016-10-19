<?php

namespace PaperStore\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        //
    ];

	/**
     * Class event subscribers
     * @var array
     */
    protected $subscribe = [
		/**
		 * Frontend Subscribers
		 */

		/**
		 * Auth Subscribers
		 */
		\PaperStore\Listeners\Frontend\Auth\UserEventListener::class,

		/**
		 * Backend Subscribers
		 */

		/**
		 * Access Subscribers
		 */
        \PaperStore\Listeners\Backend\Access\User\UserEventListener::class,
		\PaperStore\Listeners\Backend\Access\Role\RoleEventListener::class,
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
