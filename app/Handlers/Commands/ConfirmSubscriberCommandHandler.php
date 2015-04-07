<?php namespace App\Handlers\Commands;

use App\Commands\ConfirmSubscriberCommand;
use Illuminate\Queue\InteractsWithQueue;
use App\Subscribers;
use App\Events\SubscriberWasConfirmed;
use Event;

class ConfirmSubscriberCommandHandler {

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
	 * @param  ConfirmSubscriberCommand  $command
	 * @return void
	 */
	public function handle(ConfirmSubscriberCommand $command)
	{
		$subscriber = Subscribers::where('confirmation_code','=',$command->confirmation_code)->first();
    if ( ! $subscriber )
    {
      return "false";
    }
    $subscriber->update(['confirmed' => '1']);

    Event::fire(new SubscriberWasConfirmed($subscriber));
	}

}
