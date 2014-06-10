<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function() {
	return View::make('hello');
} );

Route::get('users', function() {
    return View::make('user');
} );

Route::group(array('prefix' => 'form/'), function(){
    Route::get('index',      'FormController@getIndex');

    Route::get('form',       'FormController@getForm');

    Route::post('form',      'FormController@postForm');
 
    Route::post('formCheck', 'FormController@postFormcheck');
 
    Route::post('finish',    'FormController@postFinish');
} );
