<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('constituencies', 'ConstituecyController');
Route::resource('schools', 'SchoolController');
Route::resource('counties', 'CountyController');
Route::resource('countries', 'CountryController');
Route::resource('user', 'UserController');
Route::resource('courses', 'CourseController');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('statistics', 'StatisticController');
