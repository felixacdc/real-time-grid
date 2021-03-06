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
use Illuminate\Http\Request;

use App\Http\Requests;

Route::get('/', 'UsersController@welcome');
Route::get('/users', 'UsersController@getUsers');
Route::get('/new_user', 'UsersController@newUser');
Route::post('save', function(Request $request) {
	$user = new App\User;
	$user->email = $request->email;
	$user->name = $request->name;
	$user->password = $request->password;
	$user->save();
	event(new App\Events\UserRegistered($user));

	return redirect('/new_user')->with('success', 'El usuario fue registrado exitosamente.');
});
