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
# Regiter
Route::post('/register', 'Auth\RegisterController@register')->name('regiter');
# Logout
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
# Login
Route::post('/login', 'Auth\LoginController@login')->name('login');
# This route returns the user data
Route::get('/me', 'UsersController@me')->middleware(['auth:api,web'])->name('users.me.web');

# Vue capture all the routes that not match at the beigining with 'api'
Route::get('/{all}', function () {
    return view('App');
})->where(['all' => '^(?!api).+']);
# Vue capture the initial route resource
Route::get('/', function () {
    return view('App');
});

// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');