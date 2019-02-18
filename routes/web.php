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
    return view('/home');
});

Route::get('/faq/{id}', 'FrontEndController@listing');

Auth::routes();

Route::group(['middleware'=>'auth'], function () {

	Route::resource('admin/categories','CategoryController');
	Route::get('admin/categories/delete/{id}','CategoryController@destroy');
    Route::any('admin/categories/search','CategoryController@search');
    
    Route::resource('admin/categories/faq','FaqController');
	Route::get('admin/categories/faq/delete/{id}','FaqController@destroy');
	Route::get('admin/categories/faq/list/{id}', 'FaqController@faqList');
	Route::get('admin/categories/faq/create/{id}', 'FaqController@createFaq');
	Route::get('admin/categories/faq/edit/{id}', 'FaqController@editFaq');

});



Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin', 'HomeController@index')->middleware('auth');
Route::get('admin/home', 'HomeController@index')->middleware('auth');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');