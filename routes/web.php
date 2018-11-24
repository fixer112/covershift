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
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/hire', function () {
    return view('hire');
});

Route::get('/privacy', function () {
    return view('privacy');
});

Route::get('/terms', function () {
    return view('terms');
});

Route::get('/alert', function () {
    return view('alert');
});

Route::get('/cancel', function () {
    return view('cancel');
});

Route::get('/download/{invoice}', function ($invoice) {
	return response()->file(public_path('/reciept/'.$invoice.'.pdf'));
  	//return redirect('/');
});

//Route::get('reciept/{invoice}', 'OrderController@reciept');

Route::get('details', 'OrderController@details')->name('details');
Route::get('summary/{id}', 'OrderController@summary')->name('summary');
Route::get('make_payment/{invoice}', 'OrderController@make_payment');
Route::post('payment', 'OrderController@payment')->name('payment');
Route::get('success', 'OrderController@success')->name('success');
Route::get('verify/{verify}', 'OrderController@verify_user')->name('verify');
Route::get('/book_staff/{service}', 'OrderController@book')->name('book');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
