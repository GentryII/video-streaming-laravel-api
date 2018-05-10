<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/api', 'APIController@api');

//Route::get('/login', ['middleware' => 'auth', 'uses' => 'APIController@api']);
Route::get('/login', 'APIController@login');
Route::get('/register', 'PICCRegisterController@register');
Route::get('/sunday_sermon', 'APIController@sundaySermons');
Route::get('/monday_sermon', 'APIController@mondaySermons');
Route::get('/tuesday_sermon', 'APIController@tuesdaySermons');
Route::get('/wednesday_sermon', 'APIController@wednesdaySermons');
Route::get('/thursday_sermon', 'APIController@thursdaySermons');
Route::get('/friday_sermon', 'APIController@fridaySermons');
Route::get('/saturday_sermon', 'APIController@saturdaySermons');
Route::post('register', function(Request $request) {
    return Article::create($request->all);
});
