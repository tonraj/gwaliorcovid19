<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('api')->get('/map', 'apiService@map');
Route::middleware('api')->post('/report_crowd', 'apiService@report_crowd');
Route::middleware('api')->post('/emergency', 'apiService@emergency');
Route::middleware('api')->post('/announcement', 'apiService@announcement');
Route::middleware('api')->post('/store_update', 'apiService@store_update');
Route::middleware('api')->post('/store_data', 'apiService@store_data');
Route::middleware('api')->post('/login', 'apiService@login');
Route::middleware('api')->post('/statuschange', 'apiService@statuschange');
Route::middleware('api')->post('/statuscrowd', 'apiService@statuscrowd');
Route::middleware('api')->get('/data', 'apiService@data');



