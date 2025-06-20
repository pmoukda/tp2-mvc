<?php
use App\Routes\Route;
use App\Controllers\HomeController;
use App\Controllers\VoitureController;
use App\Controllers\ClientController;
use App\Controllers\LocationController;

Route::get('', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/home/index', 'HomeController@index');


Route::get('/voiture', 'VoitureController@index');

Route::get('/client', 'ClientController@index');

Route::get('/location', 'LocationController@index');
Route::get('/location/view', 'LocationController@view');
Route::get('/location/create', 'LocationController@create');
Route::post('/location/store', 'LocationController@store');
Route::get('/location/edit', 'LocationController@edit');
Route::post('/location/edit', 'LocationController@update');
Route::post('/location/delete', 'LocationController@delete');

Route::dispatch();