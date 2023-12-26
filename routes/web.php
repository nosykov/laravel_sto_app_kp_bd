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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/management', function () {
    return view('management.index');
});

Route::resource('management/brand','Management\BrandController');
Route::resource('management/carmodel','Management\ModelController');
Route::resource('management/client','Management\ClientController');
Route::resource('management/car','Management\CarController');
Route::resource('management/master','Management\MasterController');
Route::resource('management/part','Management\PartController');
Route::resource('management/user','Management\UserController');
