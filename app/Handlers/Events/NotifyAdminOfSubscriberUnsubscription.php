<?php namespace App\Handlers\Events;

use App\Events\SubscriberWasUnsubscribed;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Mail;


class NotifyAdminOfSubscriberUnsubscription {

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
	 * @param  SubscriberWasUnsubscribed  $event
	 * @return void
	 */
	public function handle(SubscriberWasUnsubscribed $event)
	{
		$Admin = User::where('id','!=','')->first();
		$subscriber = json_decode(json_encode($event), true);

		$data = [ 'Admin'  	 => $Admin['name'],
              	'name'  	 => $subscriber['subscribers']['firstName'],
              	'email'    => $subscriber['subscribers']['email'],
              	'messages'  => "Following lead have unsubscribed!",
            ];
            
	    $to = $Admin->email;

	    Mail::send('emails/notifyadminforsubscription',$data, function($message) use($to)
	    {
	        $message->to($to)->subject('Unsubscribe');
	    });
	}
}
