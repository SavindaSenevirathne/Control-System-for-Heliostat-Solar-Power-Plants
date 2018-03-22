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
Route::get('plants', 'PlantsController@index');
Route::get('plants/{plant}', 'PlantsController@show');


Auth::routes();

Route::get('/Position', 'TemperatureController@Position');


// Route::get('/home', 'HomeController@index')->name('home');
