<?php namespace App\Http\Controllers;

use App\User;
use App\Subscribers;
use App\Settings;
use App\Http\Requests\SubscriberFormRequest;
use App\Commands\CreateSubscriberCommand;
use App\Commands\ConfirmSubscriberCommand;
use App\Commands\UnsubscribeSubscriberCommand;
use Lang;
use Mail;
use Illuminate\Http\RedirectResponse;
use Redirect;



class SubscriberController extends Controller {

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest');
  }

  /**
   * Show the application dashboard to the subscriber.
   *
   * @return Response
   */
  public function index()
  {
    if($this->settings() && $this->settings()->theme) {
      $settings = $this->settings();
      return view('themes/'.$this->settings()->theme.'/index',compact('settings'));
    }
    return view('index');
  }

  /**
   * Redirect subscriber to confirmation page.
   *
   * @return Response
   */
  public function confirmed()
  {
    if($this->settings() && $this->settings()->theme) {
      $settings = $this->settings();
      return view('themes/'.$this->settings()->theme.'/confirmed',compact('settings'));
    }
    return view('themes/default/confirmed');
  }

  /**
   * Redirect subscriber to Thanks page.
   *
   * @return Response
   */
  public function thanks()
  {
    if($this->settings() && $this->settings()->theme) {
      $settings = $this->settings();
      return view('themes/'.$this->settings()->theme.'/thanks',compact('settings'));
    }
    return view('themes/default/thanks');
  }

  /**
   * Create a new Subscriber.
   *
   * @return Response
   */
  public function store(SubscriberFormRequest $request, Subscribers $subscribers)
  {
    $status = $this->dispatch( new CreateSubscriberCommand( $request->firstName , $request->lastName, $request->email) );
      if($status == "confirmed"){
        return Redirect('/confirmed')->with('message',Lang::get('admin/subscriber/email/message.verfied'));

      }else if($status == "renew"){
        return Redirect('/confirmed')->with('message', Lang::get('admin/subscriber/message.subscription.renew'));

      }else {
        return Redirect('/thanks')->with('message', Lang::get('admin/subscriber/message.register.success'));
      }
  }

  /**
   * Attempt to confirm a Subscriber account.
   *
   * @param $confirmation_code
   *
   */
  public function confirmSubscriber($confirmation_code)
  {
    $status = $this->dispatch( new ConfirmSubscriberCommand( $confirmation_code ));

    if ( $status == "false")
    {
      return Redirect('/');
    }
    return Redirect('/confirmed')->with('message', Lang::get('admin/subscriber/email/message.verfied'));
  }

  /**
   * Attempt to Unsubscribe a Subscriber.
   *
   * @param $confirmation_code
   *
   */
  public function unsubscribe($confirmation_code)
  {
    $status = $this->dispatch( new UnsubscribeSubscriberCommand( $confirmation_code ));
    if ( $status == "false")
    {
      return Redirect('/');
    }
    return Redirect('/')->with('message', Lang::get('admin/subscriber/message.subscription.unsubscribe'));
  }

  public function settings()
  {
    return Settings::where('id','!=','')->first();
  }

}
