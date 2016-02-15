<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

/*
|--------------------------------------------------------------------------
| REST API Routes
|--------------------------------------------------------------------------
|
| Configuration for API REST Services
|
 */

//Enable two get requests with endpoints index and show on the IdController
Route::resource('api/id', 'IdController', ['only' => [
    'index', 'show'
]]);

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});


//Default end-point if no route is found.
Route::get('{all}', function () {
    return view('home');
});