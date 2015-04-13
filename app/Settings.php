<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Mail;

class Settings extends Model {


  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'settings';
  public $timestamps = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['logo', 'title', 'description', 'subtitle', 'theme', 'twitter', 'facebook', 'googleplus', 'linkedin'];

}
