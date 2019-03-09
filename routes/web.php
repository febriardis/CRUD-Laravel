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

Route::group(['middleware' => 'guest'], function(){
	Route::get('/', function () {return view('auth.login');})->name('login');
	Route::post('/login', 'AuthController@login')->name('log');

	Route::get('/register', function () {return view('auth.register');})->name('register');
	Route::post('/register', 'AuthController@register')->name('regist');
});

Route::group(['middleware' => 'auth'], function() {
	Route::get('/logout', 'AuthController@logout')->name('logout');

	Route::get('/home', function(){
		return view('home');
	})->name('home');

	Route::get('/books', 'BookController@index')->name('book.index');
	Route::get('/book', 'BookController@create')->name('book.create');
	Route::post('/book', 'BookController@insert')->name('book.insert');
	Route::get('/book/{id}', 'BookController@edit')->name('book.edit');
	Route::put('/book/{id}', 'BookController@update')->name('book.update');
	Route::delete('/book/{id}', 'BookController@delete')->name('book.delete');

	Route::get('/foods', 'FoodController@index')->name('food.index');
	Route::get('/food', 'FoodController@create')->name('food.create');
	Route::post('/food', 'FoodController@insert')->name('food.insert');
	Route::get('/food/{id}', 'FoodController@edit')->name('food.edit');
	Route::put('/food/{id}', 'FoodController@update')->name('food.update');
	Route::delete('/food/{id}', 'FoodController@delete')->name('food.delete');
	
	Route::get('/send mail', 'MailController@mail')->name('email');
});