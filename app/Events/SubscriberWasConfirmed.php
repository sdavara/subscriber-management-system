<?php namespace App\Events;

use App\Events\Event;
use App\Subscribers;

use Illuminate\Queue\SerializesModels;

class SubscriberWasConfirmed extends Event {

	use SerializesModels;
	public $subscribers;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(Subscribers $subscribers)
	{
		$this->subscribers = $subscribers;
	}

}
