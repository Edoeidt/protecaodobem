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
    return view('/auth/login');
});

Route::resource('donators', 'DonatorController',  ['only' => ['create', 'store']]);
Route::resource('providers', 'ProviderController',  ['only' => ['create', 'store']]);
Route::resource('logistic', 'LogisticController',  ['only' => ['create', 'store']]);
Route::resource('entities', 'EntityController',  ['only' => ['create', 'store']]);
Route::resource('work', 'WorkController',  ['only' => ['create', 'store']]);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('donators', 'DonatorController',['except' => ['create', 'store']]);
    Route::resource('providers', 'ProviderController',['except' => ['create', 'store']]);
    Route::resource('logistic', 'LogisticController',['except' => ['create', 'store']]);
    Route::resource('entities', 'EntityController',['except' => ['create', 'store']]);
    Route::resource('work', 'WorkController',['except' => ['create', 'store']]);
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

