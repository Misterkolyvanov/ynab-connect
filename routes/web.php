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

Route::get('/how-it-works', function () {
    return view('how_it_works');
});

Route::get('/terms-conditions', function () {
    return view('terms_conditions');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/get-async/settings-content', 'HomeController@async_settings_content');
Route::get('/get-async/system-content', 'HomeController@async_system_status');

Route::get("/api-test/habitica/{user_key}", 'HabiticaAPI@api_test');
Route::get("/api-test/ynab/{token}", 'YnabAPI@api_test');

Route::get("/run-program", 'HomeController@async_init_run');


Route::post('/user/configuration', 'HomeController@store_configuration');

