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

Route::get('/admin/stores', 'HomeController@stores');
Route::post('/admin/stores', 'HomeController@stores');

Route::get('/admin/helper', 'HomeController@helper');
Route::post('/admin/helper', 'HomeController@helper');

Route::get('/admin/social', 'HomeController@social');
Route::post('/admin/social', 'HomeController@social');

Route::get('/admin/emergency', 'HomeController@emergency');

Route::get('/admin/message', 'HomeController@message');
Route::post('/admin/message', 'HomeController@message');


Route::get('/admin/bulkmessage', 'HomeController@bulkmessage');
Route::post('/admin/bulkmessage', 'HomeController@bulkmessage');

Route::get('/register/store', 'WebController@store');
Route::post('/register/store', 'WebController@store');

Route::get('/register/socialservice', 'WebController@socialservice');
Route::post('/register/socialservice', 'WebController@socialservice');

Route::get('/register/officer', 'WebController@officer');
Route::post('/register/officer', 'WebController@officer');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
