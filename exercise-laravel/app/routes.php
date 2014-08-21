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

Route::get('todo','TodoController@index');
Route::post('todo/add','TodoController@store');
Route::post('todo/done','TodoController@done');
Route::put('todo/delete','TodoController@destroy');
Route::get('todo/update','TodoController@update');