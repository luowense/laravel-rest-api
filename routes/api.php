<?php

use App\Message;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('messages', function() {
   return Message::all();
});

Route::get('messages/{id}', function($id) {
   return Message::find($id);
});

Route::post('articles', function(Request $request) {
    return Message::create($request->all);
});

Route::put('messages/{id}', function(Request $request, $id) {
    $message = Message::findOrFail($id);
    $message->update($request->all());

    return $message;
});

Route::delete('articles/{id}', function($id) {
    Message::find($id)->delete();

    return 204;
});

Route::get('messages', 'MessageController@index');
Route::get('messages/{message}', 'MessageController@show');
Route::post('messages', 'MessageController@store');
Route::put('messages/{message}', 'MessageController@update');
Route::delete('messages/{message}', 'MessageController@delete');


//About authentication and access to the api

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

Route::middleware('auth:api')
    ->get('/user', function (Request $request) {
        return $request->user();
    });


