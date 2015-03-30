<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', 'WelcomeController@index');
// Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// Admin
Route::group(array('prefix' => 'admin', 'middleware' => 'auth'), function() {

  # Subscriber Management
  Route::get('/subscriber', 'AdminController@getSubscribers');

  # Settings Managment
  Route::get('/settings', 'AdminController@showSettings');
  Route::post('/settings/{Id}', 'AdminController@postSettings');


  # Admin Dashboard
  Route::get('/', 'AdminController@index');

});

//subscriber
Route::get('/', ['middleware' => 'guest','uses' =>'SubscriberController@index']);
Route::get('/subscribe','SubscriberController@index');
Route::post('/subscribe','SubscriberController@store');

Route::get('/thanks','SubscriberController@thanks');
Route::get('/verify/{confirmationCode}','SubscriberController@confirmSubscriber');
Route::get('/confirmed','SubscriberController@confirmed');
Route::get('/unsubscribe/{confirmationCode}',['middleware' => 'guest', 'uses' => 'SubscriberController@unsubscribe']);
