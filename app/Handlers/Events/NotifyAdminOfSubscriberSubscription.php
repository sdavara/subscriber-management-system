<?php namespace App\Handlers\Events;

use App\Events\SubscriberWasConfirmed;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Mail;

class NotifyAdminOfSubscriberSubscription {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{

	}

	/**
	 * Handle the event.
	 *
	 * @param  SubscriberWasConfirmed  $event
	 * @return void
	 */
	public function handle(SubscriberWasConfirmed $event)
	{

		$Admin = User::where('id','!=','')->first();

		$subscriber = json_decode(json_encode($event), true);

		$data = [ 
				'Admin'  	 => $Admin['name'],
            	'name'  	 => $subscriber['subscribers']['firstName']." ".$subscriber['subscribers']['lastName'],
            	'email'    => $subscriber['subscribers']['email'],
            	'messages' => "Following subscriber have subscribed Succesfully!",
            ];

	    $to = $Admin->email;

	    Mail::send('emails/notifyadminforsubscription',$data, function($message) use($to)
	    {
	        $message->to($to)->subject('confirmation');
	    });
	}
}
