<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

Route::any('paypalCalback', 'PaymentsController@paypalCalback')->middleware(['auth:api,web']); 
Route::post('/recharge', 'PaymentsController@recharge')->middleware(['auth:api,web']);

Route::apiResource('/users', 'UsersController');
Route::apiResource('/artists', 'ArtistsController');
Route::apiResource('/places', 'PlacesController');
Route::apiResource('/requests', 'RequestsController')->middleware(['auth:api,web']);
Route::get('/my/requests', 'RequestsController@mine')->middleware(['auth:api,web']);
Route::get('/me', 'UsersController@me')->middleware(['auth:api,web'])->name('users.me.api');
Route::delete('/me', 'UsersController@selfDestruct')->middleware(['auth:api,web'])->name('users.me.api');
Route::get('/me/artists', 'UsersController@artists')->middleware(['auth:api,web'])->name('users.me.api');
Route::post('/me/artists/{artist}/places/{place}', 'ArtistsController@makeAvailable')->middleware(['auth:api,web'])->name('users.me.api');

/**
 * Files resources
 */
Route::post('files/{resource}/{id}', 'Controller@storeFilesRoute')->where('resource', Controller::resourceRegex())->middleware(['auth:api,web']);
Route::delete('files/{resource}/{file}', 'Controller@destroyFile')->where('resource', Controller::resourceRegex())->middleware(['auth:api,web']);
Route::put('files/order', 'Controller@orderFile');