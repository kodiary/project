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

Route::get('/testhome', 'HomeController@test')->name('testhome');
Route::get('/test', 'TestController@index')->name('test');
Route::get('/about', 'TestController@about')->name('about');


Route::namespace('Admin')->prefix('admin')->as('admin.')->middleware('auth')->group(function(){

	Route::get('/', 'HomeController@index')->name('home');
	Route::resource('/categories', 'CategoriesController');
	Route::resource('/news', 'NewsController');

});

