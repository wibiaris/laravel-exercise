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
Route::any("/group/index", [
	"as" => "group/index",
	"uses" => "GroupController@indexAction"]);
Route::any("/",[
	"as" => "user/login",
	"uses" => "UsersController@login"
	]);
Route::group(["before" => "auth"],function(){
	Route::any("/profile",[
	"as" => "user/profile",
	"uses" => "UsersController@profile"
	]);

});

Route::any("/request",[
	"as" => "user/request",
	"uses"=> "UsersController@request"
	]);
Route::any("/reset/{token}", [
	"as" => "user/reset",
	"uses" => "UsersController@reset"
	]);

Route::any("/logout",[
	"as" => "user/logout",
	"uses" => "UsersController@logout"
	]);


// Route::get('/', function()
// {
// 	return View::make('hello');
// });
