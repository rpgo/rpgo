<?php namespace Rpgo\Access\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Rpgo\Application\Events\Handlers\Notifier;
use Rpgo\Application\Events\UserWasRegistered;
use Rpgo\Application\Events\WorldWasCreated;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'listen' => [ 'listener' ]
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
        $events->listen([
            UserWasRegistered::class,
            WorldWasCreated::class,
        ], Notifier::class);

		parent::boot($events);

		//
	}

}
