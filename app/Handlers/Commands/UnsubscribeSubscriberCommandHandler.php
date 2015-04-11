<?php namespace App\Handlers\Commands;

use App\Commands\UnsubscribeSubscriberCommand;
use Illuminate\Queue\InteractsWithQueue;
use App\Subscribers;
use App\Events\SubscriberWasUnsubscribed;
use Event;

class UnsubscribeSubscriberCommandHandler {

	/**
	 * Create the command handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the command.
	 *
	 * @param  UnsubscribeSubscriberCommand  $command
	 * @return void
	 */
	public function handle(UnsubscribeSubscriberCommand $command)
	{
		$subscriber =  Subscribers::where('confirmation_code','=',$command->confirmation_code)->first();

	    if ( !$subscriber )
	    {
	      return false;
	    }

	    // Cancel subscription
	    $subscriber->update(['status' => 'unsubscribed']);
	    Event::fire(new SubscriberWasUnsubscribed($subscriber));
	}

}
