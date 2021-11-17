<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserExchangeController;
use App\Http\Controllers\Api\GeneralController;
use App\Http\Controllers\Api\UserDreamController;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('register', [AuthController::class, 'register'])->name('api.register');
Route::post('login', [AuthController::class, 'login']);

Route::get('political_division/{type?}', [GeneralController::class, 'political_division']);
Route::get('cities', [GeneralController::class, 'cities']);

Route::middleware('auth:api')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::post('recover-password', [AuthController::class, 'recoverPassword'])->name('api.recoverPassword');
Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('api.resetPassword');