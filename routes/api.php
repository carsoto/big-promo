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

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::resource('users', UserController::class, ['as' => 'api.users']);
    Route::post('exchange', [UserExchangeController::class, 'store']);
    Route::get('exchange/history', [UserExchangeController::class, 'show']);
    Route::post('upload-dream', [UserDreamController::class, 'store']);
    Route::get('dreams', [UserDreamController::class, 'show']);
});