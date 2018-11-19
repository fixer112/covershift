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

Route::get('details', 'OrderController@details')->name('details');

Route::get('/book_staff/{service}', 'OrderController@book')->name('book');
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
