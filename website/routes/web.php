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

    $build = collect([]);
    $build->push(['message_type', '=', 'Home']);

    $params['announcemnets'] = App\Message::where($build->all())->take(5)->get();
    $path = base_path('covid.json');

    $params['data'] =  json_decode(file_get_contents($path), true);
    return view('welcome', $params);

});

Route::get('/download', function () {

    return view('Web.Download');

});

Route::get('/admin/stores', 'HomeController@stores');
Route::post('/admin/stores', 'HomeController@stores');

Route::get('/admin/station', 'HomeController@station');
Route::post('/admin/station', 'HomeController@station');


Route::get('/admin/helper', 'HomeController@helper');
Route::post('/admin/helper', 'HomeController@helper');

Route::get('/admin/social', 'HomeController@social');
Route::post('/admin/social', 'HomeController@social');

Route::get('/admin/emergency', 'HomeController@emergency');

Route::get('/admin/message', 'HomeController@message');
Route::post('/admin/message', 'HomeController@message');

Route::get('/admin/crowd', 'HomeController@crowd');
Route::post('/admin/crowd', 'HomeController@crowd');

Route::get('/admin/map', 'HomeController@map');
Route::post('/admin/map', 'HomeController@map');

Route::get('/admin/announcement', 'HomeController@homemessage');
Route::post('/admin/announcement', 'HomeController@homemessage');

Route::get('/admin/bulkmessage', 'HomeController@bulkmessage');
Route::post('/admin/bulkmessage', 'HomeController@bulkmessage');

Route::get('/register/store', 'WebController@store');
Route::post('/register/store', 'WebController@store');

Route::get('/register/socialservice', 'WebController@socialservice');
Route::post('/register/socialservice', 'WebController@socialservice');

Route::get('/register/officer', 'WebController@officer');
Route::post('/register/officer', 'WebController@officer');

Route::get('/report', 'WebController@report');
Route::post('/report', 'WebController@report');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@index')->name('home');
