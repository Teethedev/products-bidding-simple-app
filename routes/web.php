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

/*Route::get('/', function () {
    return view('index');
});*/
Route::get('/', 'FrontendController@index');
Route::resource('frontend', 'FrontendController');
Route::post('frontend/bid', 'FrontendController@bid');
Route::post('frontend/search', 'FrontendController@search');
Route::get('frontend/search', 'FrontendController@index');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::post('/dashboard/search', 'DashboardController@search');
Route::get('/dashboard/search', 'DashboardController@index');

Route::resource('dashboard/products', 'ProductController');

//Route::post('dashboard/products/bid', 'ProductController@bid');
