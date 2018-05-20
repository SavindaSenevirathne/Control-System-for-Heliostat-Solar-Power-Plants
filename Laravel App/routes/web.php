<?php

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
Route::get('/', 'SessionsController@home');
Route::get('/home', 'SessionsController@index');
Route::get('/plants', 'PlantsController@index');
Route::get('/plants/add', 'PlantsController@add');
Route::post('/plants/add', 'PlantsController@save');
Route::get('/plants/{plant}', 'PlantsController@show');

Route::get('/chart', 'PlantsController@chart');
// Route::get('/test_data','PlantsController@response');


Route::get('/home/profile', 'UsersController@index');
Route::get('/home/profile/edit', 'UsersController@edit');
Route::post('/home/profile/edit', 'UsersController@update');

Route::post('/home/profile/UpdatePassword', 'UsersController@updatePassword');

Auth::routes();

Route::get('/Position', 'TemperatureController@Position');



// Route::get('/home', 'HomeController@index')->name('home');
