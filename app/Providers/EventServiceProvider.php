<?php namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\SubscriberWasCreated;
use App\Handlers\Events\NotifySubscribersOfSubscription;
use App\Events\SubscriberWasConfirmed;
use App\Handlers\Events\NotifyAdminOfSubscriberSubscription;
use App\Handlers\Events\NotifySubscriberOfConfirmation;
use App\Events\SubscriberWasUnsubscribed;
use App\Handlers\Events\NotifyAdminOfSubscriberUnsubscription;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		SubscriberWasCreated::class => [
			NotifySubscribersOfSubscription::class,
		],
		SubscriberWasConfirmed::class => [
			NotifyAdminOfSubscriberSubscription::class,
			NotifySubscriberOfConfirmation::class,
		],
		SubscriberWasUnsubscribed::class => [
			NotifyAdminOfSubscriberUnsubscription::class,
		],
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
