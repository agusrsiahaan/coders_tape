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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('contact', function(){
// 	return view('contact');
// });

// Route::get('about', function(){
// 	return view('about');
// });

//or we can use this directly to return the view
Route::view('/', 'home');

Route::get('contact', 'ContactFormController@create')->name('contact.create');
Route::post('contact', 'ContactFormController@store')->name('contact.store');

Route::view('about', 'about')->middleware('test');

Route::get('customers', 'CustomersController@index');
Route::get('customers/create', 'CustomersController@create');
Route::post('customers', 'CustomersController@store');
Route::get('customers/{customer}', 'CustomersController@show')->middleware('can:view,customer');
Route::patch('customers/{customer}', 'CustomersController@update');
Route::get('customers/{customer}/edit', 'CustomersController@edit');
Route::delete('customers/{customer}', 'CustomersController@destroy');


//route diatas bisa diwakilkan dengan route resource satu baris ini
//Route::resource('customers', 'CustomersController');
//Route::resource('customers', 'CustomersController')->middleware('auth');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');
