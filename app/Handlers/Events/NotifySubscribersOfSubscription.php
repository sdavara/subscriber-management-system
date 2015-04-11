<?php namespace App\Handlers\Events;

use App\Events\SubscriberWasCreated;
use App\Subscribers;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Mail;

class NotifySubscribersOfSubscription {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct(Subscribers $subscribers)
	{
		$this->subscribers = $subscribers;
	}

	/**
	 * Handle the event.
	 *
	 * @param  SubscriberWasCreated  $event
	 * @return void
	 */
	public function handle(SubscriberWasCreated $event)
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
