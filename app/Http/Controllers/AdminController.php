<?php namespace App\Http\Controllers;

use Redirect;
use App\User;
use App\Subscribers;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SubscriberFormRequest;
use Lang;
use Config;

class AdminController extends Controller {


  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
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
  public function getSubscribers(Subscribers $subscribers)
  {
    // Grab all the subscribers
    $subscribers = $subscribers->all();
    return view('admin.subscribers', compact('subscribers'));

  }

  /**
   * Show the Settings.
   *
   * @return Response
   */
  public function showSettings()
  {
    $settings = Settings::where('id','!=','')->first();
    $projectThemes = Config::get('app.themes');
    $thumbnails;

    foreach($projectThemes as $themes){
      if ($handle = opendir(public_path().'/thumbnails/'.$themes)) {
              $blacklist = array('.', '..','.DS_Store');
              while (false !== ($file = readdir($handle))) {
                  if (!in_array($file, $blacklist)) {
                     $thumbnails[$themes] = '/thumbnails/'.$themes.'/'.$file;
                  }
              }
              closedir($handle);
        }
    }
   return view('admin.settings', compact('settings','thumbnails','projectThemes'));
  }

  /**
   * Edit the Settings.
   *
   * @return Response
   */
  public function postSettings(Request $request)
  {
    $settings = $request->all();
    $oldSettings = Settings::where('id','!=','')->first();

    // Rename and upload file
    if($request->file('logo')){
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
