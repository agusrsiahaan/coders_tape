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
Route::get('/', function() {

	// $user = factory(\App\User::class)->create();
	// $phone = new \App\Phone();

	// $phone->phone = '123-123-123';
	// $user->phone()->save($phone);

	$user = factory(\App\User::class)->create();

	$user->phone()->create([
		'phone' => '1231212323',
	]);

});

Route::get('/post', function() {

	// $user = factory(\App\User::class)->create();

	// $post = new \App\Post([

	// 	'title' => 'Title',
	// 	'Body' => 'Body',
	// 	'user_id' => $user->id,
	// ]);

	$user = factory(\App\User::class)->create();

	$user->posts()->create([
		'title' => 'Title',
		'Body' => 'Body',
	]);

	$user->posts->first()->title ='New Post';
	$user->posts->first()->body = 'New Body';

	$user->push();

	dd($user->posts);

});

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
