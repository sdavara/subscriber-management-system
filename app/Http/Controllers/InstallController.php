<?php namespace App\Http\Controllers;

use October\Rain\Config\Rewrite as NewConfig;
use Redirect;
use App\User;
use App\Subscribers;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SubscriberFormRequest;
use Mail;
use Lang;
use Config;
use Illuminate\Support\Facades\DB;
use Exception;
use Hash;
use Log;
use File;


class InstallController extends Controller {


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
  * Check the index
  */
  public function getIndex()
  {
    if(Config::get('newsletter.install'))
    {
      return view('install.err');
    }
    else
    {
      return view('install.syscheck');
    }
  }

  public function getDatabase()
  {
    return view('install.database');
  }


  public function postDatabase(Request $request)
  {
    $data = $request->all();
    $newDbConfig = new NewConfig;

   $newDbConfig->toFile(config_path().'/database.php', [
        'connections.mysql.host'     =>$data['Host'],
        'connections.mysql.database' =>$data['database'],
        'connections.mysql.username' =>$data['username'],
        'connections.mysql.password' =>$data['password'],
      ]);


    $data = "APP_ENV = local \nAPP_DEBUG = true \nAPP_HOST=" .  $data['Host']."\nDB_DATABASE=" .$data['database'] ."\nDB_USERNAME=" .$data['username'] ."\nDB_PASSWORD=" .$data['password'] ."\nCACHE_DRIVER=file\nSESSION_DRIVER=file\nAPP_KEY=SomeRandomString";

    $file = fopen(base_path().'/.env',"w");

    fwrite($file, print_r($data, TRUE));
    fclose($file);


    DB::unprepared(file_get_contents(app_path().'/newsletter.sql'));

    return view('install.timezone');
  }

  public function postTimeZone(Request $request)
  {
    $timeZone = $request->get('timezone');
    $newAppConfig = new NewConfig;
    $newAppConfig->toFile(config_path().'/app.php', [
              'timezone'=> $timeZone
            ]);

    return view('install.adminaccount');
  }

  public function postAdminAccount(Request $request)
  {
    $data = $request->all();
    try
        {
           User::create([
            'email' => $data['email'] ,
            'password' => bcrypt($data['password']),
            'name' => $data['firstName'] ,
            ]);
            $installationDate = date('Y-m-d H:i:s');
            // $installationHost = Request::server('PATH_INFO');
            $new92fiveConfig = new NewConfig;
            $new92fiveConfig->toFile(config_path().'/newsletter.php', [
              'install'=> true,
              'version' => '1.0',
              'installationDate'=>$installationDate,
              // 'installationHost' =>$installationHost
            ]);
            return view('install.done');
        }
        catch(Exception $e)
        {
            Log::error('Something Went Wrong in Install Controller Repository - addUserWithDetails():'. $e->getMessage());
            return false;
        }
  }
}