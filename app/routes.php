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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('users', function()
{
    return View::make('user');
});

Route::get('form_index', function(){
    return View::make('index');
});

Route::match(array('GET', 'POST'), 'form_form', function(){
    return View::make('form');
});

Route::post('form_formCheck', function(){
    return View::make('formCheck');
});

Route::post('form_finish', function(){
    return View::make('finish');
});
