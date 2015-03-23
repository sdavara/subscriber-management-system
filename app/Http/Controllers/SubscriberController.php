<?php namespace App\Http\Controllers;

use Redirect;
use App\User;
use App\Subscribers;
use App\Settings;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SubscriberFormRequest;
use Mail;
use Lang;


class SubscriberController extends Controller {


  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(User $user,Subscribers $subscribers,Settings $settings)
  {
    $this->middleware('guest');
    $this->user = $user;
    $this->subscribers = $subscribers;
    $this->settings = $settings;
  }

  /**
   * Show the application dashboard to the subscriber.
   *
   * @return Response
   */
  public function index()
  {
    $settings = Settings::find(1);
    return view($settings->theme,compact('settings'));
  }

  /**
   * Create a new Subscriber.
   *
   * @return Response
   */
  public function store(SubscriberFormRequest $request)
  {
    //check if subscriber exists
    $subscriber = Subscribers::where('email', $request->get('email'))->first();

    if($subscriber)
    {
      if($subscriber->status == "unsubscribed")
      {
        // Re-new subscription
        $subscriber->updateStatus($subscriber);

        return Redirect('/')->with('message', Lang::get('admin/subscribers/message.subscription.renew'));
      }
      else if ( !$subscriber->confirmed && ($subscriber->status == "subscribed") )
      {
        // Send confirm email
        $this->deliverMail($subscriber,'confirmation');

        return Redirect('/')->with('message', Lang::get('admin/subscriber/email/message.verfiy'));

      }
      else if(($subscriber->confirmed) && ($subscriber->status == "subscribed"))
      {
        $this->deliverMail($subscriber,'confirmed');
        $messages = "your email address is verified!" ;

        return Redirect('/')->with('message',Lang::get('admin/subscriber/email/message.verfied'));
      }

    }
    else
    {
      $confirmation_code = substr(md5(uniqid(rand(), true)), 16, 16);

      $subscriber = Subscribers::create([ 'firstName' => $request->get('firstName'),
                                          'lastName'=> $request->get('lastName'),
                                          'email'=> $request->get('email'),
                                          'confirmation_code'=> $confirmation_code,
                                          'confirmed'=> '0',
                                          'status'=>'subscribed'
                                        ]);

      $this->deliverMail($subscriber,'confirmation');

      return Redirect('/')->with('message', Lang::get('admin/subscriber/message.register.success'));
    }

  }

  /**
     * Attempt to confirm a Subscriber account.
     *
     * @param $confirmation_code
     *
     */

  public function confirm($confirmation_code)
  {
    $subscriber = Subscribers::where('confirmation_code','=',$confirmation_code)->first();
    if ( ! $subscriber )
    {
      return Redirect('/');
    }
    $subscriber->update(['confirmed' => '1']);

    return Redirect('/')->with('message', Lang::get('admin/subscriber/email/message.verfied'));
  }

  /**
     * Attempt to unsubscribe a Subscriber.
     *
     * @param $confirmation_code
     *
     */
  public function unsubscribe($confirmation_code)
  {
    $subscriber = Subscribers::where('confirmation_code','=',$confirmation_code)->first();

    if ( !$subscriber )
    {
      return Redirect('/');
    }

    $subscriber->updateStatus($subscriber);

    return Redirect('/')->with('message', Lang::get('admin/subscriber/message.subscription.unsubscribe'));

  }

  public function deliverMail($subscriber, $subject)
  {
    $data = [ 'name' => $subscriber->firstName ,
                'email' => $subscriber->email,
                'id' => $subscriber->id ,
                'messages' => "Please follow the link below to verify your email address ",
                'confirmation_code' => $subscriber->confirmation_code
              ];

    $to = $subscriber->email;
    Mail::send('emails/confirm',$data, function($message) use ($subject, $to)
    {
        $message->to($to)->subject($subject);
    });

  }
}
