<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::any('graphql', 'GraphQLController@root');
Route::any('graphql/{query?}', 'GraphQLController@root');

Route::apiResource('/users', 'UsersController');
Route::apiResource('/artists', 'ArtistsController');
Route::apiResource('/places', 'PlacesController');
Route::apiResource('/requests', 'RequestsController')->middleware(['auth:api,web']);
Route::get('/me', 'UsersController@me')->middleware(['auth:api,web'])->name('users.me.api');
Route::get('/me/artists', 'UsersController@artists')->middleware(['auth:api,web'])->name('users.me.api');
Route::get('/me/artists/places', 'ArtistsController@makeAvailable')->middleware(['auth:api,web'])->name('users.me.api');