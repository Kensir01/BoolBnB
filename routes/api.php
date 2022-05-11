<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// /api/apartments -> index
Route::get('/apartments', 'Api\ApartmentController@index');

Route::get('/apartments/search', 'Api\ApartmentController@search');
Route::get('/apartments/filteredsearch', 'Api\ApartmentController@filteredSearch');
Route::get('/facilities', 'Api\FacilityController@index');
// /api/apartments/* -> show
Route::get('/apartments/{slug}', 'Api\ApartmentController@show');
