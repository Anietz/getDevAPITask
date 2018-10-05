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
\Illuminate\Support\Facades\Auth::routes();

Route::post('/v1/auth/login', 'Auth\AuthenticationController@authenticate');
Route::post('/v1/auth/register', 'Auth\RegisterController@create');

Route::get('/v1/auth/logout', 'Auth\AuthenticationController@logout')->middleware('auth:api');


Route::post('/v1/bucketlists', 'HomeController@createBucketList')->middleware('auth:api');

Route::get('/v1/bucketlists', 'HomeController@getBucketList')->middleware('auth:api');

Route::get('/v1/bucketlist', 'HomeController@getSingleBucketList')->middleware('auth:api');

Route::put('/v1/bucketlist', 'HomeController@updateBucketList')->middleware('auth:api');

Route::delete('/v1/bucketlist', 'HomeController@deleteBucketList')->middleware('auth:api');


Route::post('/v1/bucketlists/{bucketlist_id}/item', 'HomeController@createBucketListItem')->middleware('auth:api');

Route::get('/v1/bucketlists/{bucketlist_id}/item', 'HomeController@getBucketListItems')->middleware('auth:api');

Route::get('/v1/bucketlists/{bucketlist_id}/item/{item_id}', 'HomeController@getSingleBucketListItem')->middleware('auth:api');

Route::put('/v1/bucketlists/{bucketlist_id}/item/{item_id}', 'HomeController@updateBucketListItem')->middleware('auth:api');

Route::delete('/v1/bucketlists/{bucketlist_id}/item/{item_id}', 'HomeController@deleteBucketListItem')->middleware('auth:api');









