<?php namespace App\Handlers\Events;

use App\Events\SubscriberWasConfirmed;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Mail;


class NotifySubscriberOfConfirmation {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  SubscriberWasConfirmed  $event
	 * @return void
	 */
	public function handle(SubscriberWasConfirmed $event)
	{
		$subscriber = json_decode(json_encode($event), true);
		$data = [ 'name'  	 => $subscriber['subscribers']['firstName'],
              'email'    => $subscriber['subscribers']['email'],
              'id'       => $subscriber['subscribers']['id'] ,
              'messages' => "Please follow the link below to verify your email address ",
              'confirmation_code' => $subscriber['subscribers']['confirmation_code'],
              'confirmed' => $subscriber['subscribers']['confirmed'],
            ];
    	$to = $subscriber['subscribers']['email'];

	    Mail::send('emails/confirm',$data, function($message) use($to)
	    {
	        $message->to($to)->subject('confirmation');
	    });
	    
	}
}
