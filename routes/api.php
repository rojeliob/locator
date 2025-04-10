<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CityController as City;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/v1/login', [\App\Http\Controllers\Api\v1\AuthController::class, 'login']);

Route::apiResource('v1/city', App\Http\Controllers\Api\V1\CityController::class)
  ->only(['index', 'show'])
  ->middleware('auth:sanctum');


