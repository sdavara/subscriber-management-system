<?php namespace App\Handlers\Commands;

use App\Commands\CreateSubscriberCommand;

use Illuminate\Queue\InteractsWithQueue;
use App\Subscribers;
use App\Events\SubscriberWasCreated;
use Event;

class CreateSubscriberCommandHandler {

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
	 * @param  CreateSubscriberCommand  $command
	 * @return void
	 */
	public function handle(CreateSubscriberCommand $command)
	{
		 $subscriber = Subscribers::where('email', $command->email)->first();
		 if($subscriber){

		 	if($subscriber->status == "unsubscribed")
      {
        // Re-new subscription
        $subscriber->update(['status' => 'subscribed']);
        Event::fire(new SubscriberWasCreated($subscriber));
        return 'renew';
      }
      else if ( !$subscriber->confirmed && ($subscriber->status == "subscribed") )
      {
      	Event::fire(new SubscriberWasCreated($subscriber));
      	return 'thanks';
      }
      else if(($subscriber->confirmed) && ($subscriber->status == "subscribed"))
      {
        Event::fire(new SubscriberWasCreated($subscriber));
        return 'confirmed';
      }

		 }else{

			$subscriber = Subscribers::create([
											'firstName'  				=> $command->firstName,
			                'lastName'   				=> $command->lastName,
			                'email'						  => $command->email,
			                'confirmation_code'	=> substr(md5(uniqid(rand(), true)), 16, 16),
	    ]);

			Event::fire(new SubscriberWasCreated($subscriber));

			return 'thanks';

		 }
		return $subscriber;
	}

}
