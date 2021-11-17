<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Api\GeneralController;
use App\Http\Controllers\UserController as UserFront;
use App\Http\Controllers\Api\UserController as UserApi;
use App\Http\Controllers\Api\UserExchangeController;
use App\Http\Controllers\Api\UserDreamController;

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
Route::get('/admin', [LoginController::class, 'showLoginForm'])->name('home');

Auth::routes(['verify' => true]);

Route::get('/register/verify/{code}', [GeneralController::class, 'verify']);

Route::get('/user-not-found', function() {
    return "<h2>USUARIO NO ENCONTRADO</h2>";
});

/*Route::get('/', function () {
    return view('user.home');
})->name('user.home');*/
Route::get('/', [UserFront::class, 'home_big'])->name('user.home');

Route::post('login-promo', [LoginController::class, 'login_promo'])->name('login.promo');

Route::prefix('u')->group(function () {
    Route::get('/login', [UserFront::class, 'login'])->name('u.login');

    Route::get('/recover-password', [UserFront::class, 'recoverPassword'])->name('u.recoverPassword');

    Route::get('/reset-password/{token}', [UserFront::class, 'resetPassword'])->name('u.resetPassword');

    Route::get('/register', [UserFront::class, 'register']);

    Route::get('/recorder', [UserFront::class, 'recorder'])->middleware('auth');

    Route::get('/videos-gallery', [UserFront::class, 'videosGallery'])->middleware('auth');

    Route::get('/exchange', [UserFront::class, 'exchange'])->name('user.exchange')->middleware('auth');

    Route::get('/history', [UserFront::class, 'history'])->middleware('auth');

    Route::get('/fq', [UserFront::class, 'fq']);
});

Route::middleware('auth')->prefix('api')->group(function () {
    Route::resource('users', UserApi::class, ['as' => 'api.users']);
    Route::post('exchange', [UserExchangeController::class, 'store']);
    Route::get('exchange/history', [UserExchangeController::class, 'show']);
    Route::post('upload-dream', [UserDreamController::class, 'store']);
    Route::get('dreams', [UserDreamController::class, 'show']);
});
