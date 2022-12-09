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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/brewery/{id}', [\App\Http\Controllers\API\BreweryController::class, 'show']);
Route::get('/top-breweries', [\App\Http\Controllers\API\BreweryController::class, 'getFirstSix']);
Route::post('/products/filter', [\App\Http\Controllers\API\FilterProductController::class, 'index']);
Route::get('/filters', \App\Http\Controllers\API\FilterListController::class);

Route::middleware('auth:sanctum')->post('/profile', [\App\Http\Controllers\API\ProfileController::class, 'show']);
Route::middleware('auth:sanctum')->post('/profile/update', [\App\Http\Controllers\API\ProfileController::class, 'update']);
