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

//Route::get('/mailable', function () {
//    $invoice = App\Invoice::find(1);
//
//    return new App\Mail\InvoicePaid($invoice);
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'AppController@getApp');

Route::resource('events', 'EventController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
