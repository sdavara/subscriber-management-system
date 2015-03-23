<?php namespace App\Http\Controllers;


use Redirect;
use App\User;
use App\Subscribers;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SubscriberFormRequest;
use Mail;
use Lang;


class AdminController extends Controller {

  /**
     * User Model
     * @var User
     */
    protected $user;

  /**
   * Subscribers Model
   * @var Subscribers
   */
    protected $subscribers;

  /**
   * Settings Model
   * @var Settings
   */
    protected $settings;


  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(User $user,Subscribers $subscribers,Settings $settings)
  {
    $this->middleware('auth');
    $this->user = $user;
    $this->subscribers = $subscribers;
    $this->settings = $settings;
  }


  /**
   * Show the application dashboard to the Admin.
   *
   * @return Response
   */
  public function index()
  {
    return view('home');
  }

  /**
   * Display Subscribers.
   *
   * @return Response
   */
  public function getSubscribers()
  {
    // Grab all the subscribers
    $subscribers = $this->subscribers->all();

    return view('admin.subscribers', compact('subscribers'));

  }

  /**
   * Show the Settings.
   *
   * @return Response
   */
  public function showSettings()
  {
    $settings = Settings::find(1);
    return view('admin.settings', compact('settings'));
  }

  /**
   * Add the Settings.
   *
   * @return Response
   */
  public function postSettings(Request $request,$Id)
  {
    $settings = $request->all();
    $oldSettings = Settings::find($Id);

    //Rename and upload file
    if(($request->file('logo')))
    {
      $file = $request->file('logo');
      $fileName = str_random(6).'_'.$file->getClientOriginalName();
      $file->move(public_path().'/uploads', $fileName);
      $settings['logo'] = $fileName;
    }

    $oldSettings->fill($settings);
    $oldSettings->save();

    return Redirect('/admin/settings')->with('message', Lang::get('admin/settings/message.edit.success'));
  }

}
