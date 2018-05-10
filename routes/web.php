<?php
use App\Sermon;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $churches = \App\Denomination::all();
    return view('welcome', compact('churches'));
});

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
    Route::get('/', function()
    {
        $count = Sermon::count();
        View::share('count', $count);
        return view('back-end.index', compact('count'));
    })-> name('back-end.index');
});
Route::get('/admin', 'AdminController@index') -> name('admin');
//Content creation routes
Route::get('/create', 'SermonsController@create') -> name('create');
Route::get('/create-church', 'ChurchesController@create') -> name('create-church');
Route::get('/create-user', 'UsersController@create') -> name('create-user');
//content creation routes

//storage routes
Route::post('/store', 'SermonsController@store') -> name('store');
Route::post('/store-church', 'ChurchesController@store') -> name('store-church');
Route::post('/store-user', 'UsersController@store') -> name('store-user');
//storage routes

//viewing routes
Route::post('/view/{id}', 'SermonsController@show') -> name('view');
Route::post('/view-church/{id}', 'ChurchesController@show') -> name('view-church');
Route::post('/view-user/{id}', 'UsersController@show') -> name('view-user');
//viewing routes

//editing routes
Route::post('/edit/{id}', 'SermonsController@edit') -> name('edit');
Route::post('/edit-church/{id}', 'ChurchesController@edit') -> name('edit-church');
Route::post('/edit-user/{id}', 'UsersController@edit') -> name('edit-user');
//editing routes

//deleting routes
Route::post('/delete/{id}', 'SermonsController@destroy') -> name('delete');
Route::post('/delete-church/{id}', 'ChurchesController@destroy') -> name('delete-church');
Route::post('/delete-user/{id}', 'UsersController@destroy') -> name('delete-user');
//deleting routes

//resource routes
Route::resource('sermons', 'SermonsController');
Route::resource('churches', 'ChurchesController');
Route::resource('front', 'FrontEndController');
Route::resource('users', 'UsersController');
//resource routes

//front-end routes
Route::post('/selection', 'FrontEndController@select') -> name('select');
Route::get('/lilongwepentecoast', 'FrontEndController@show_picc') -> name('lilongwepentecoast');
Route::post('/picc/services', 'FrontEndController@show_picc_sunday') -> name('picc');
Route::get('/christembassy', 'FrontEndController@show_picc') -> name('christembassy');
Route::get('/picc/sunday', 'FrontEndController@show_picc_sunday') -> name('sunday');
//front-end routes

//API routes
Route::get('/api', 'SermonsController@api');
Route::post('/android', 'AndroidController@show') -> name('android');
Route::post('/apistore', 'PICCRegisterController@store');
//API routes

//Notification route
Route::get('my-notification/{type}', 'NotificationController@myNotification')->name('notify');
//Notification route

//search routes
Route::post('/search', 'SearchController@search') -> name('search');
//search routes
