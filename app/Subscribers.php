<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Mail;

class Subscribers extends Model {


  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'subscribers';
  public $timestamps = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['firstName', 'lastName', 'email','confirmation_code','confirmed','status'];


}
