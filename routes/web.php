<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Api\GeneralController;
use App\Http\Controllers\UserController as UserFront;
use App\Http\Controllers\CodeController;

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
Route::post('file-import', [CodeController::class, 'codeImport'])->name('file-import');
Route::get('code-import', [CodeController::class, 'index']);

Route::get('/admin', [LoginController::class, 'showLoginForm'])->name('home');

Auth::routes(['verify' => true]);

Route::get('/register/verify/{code}', [GeneralController::class, 'verify']);

Route::get('/user-not-found', function() {
    return "<h2>USUARIO NO ENCONTRADO</h2>";
});

Route::get('/', function () {
    return view('user.home');
})->name('user.home');

Route::post('login-promo', [LoginController::class, 'login_promo'])->name('login.promo');
Route::prefix('u')->group(function () {
    Route::get('/login', [UserFront::class, 'login']);

    Route::get('/register', [UserFront::class, 'register']);

    Route::get('/recorder', [UserFront::class, 'recorder']);

    Route::get('/videos-galery', [UserFront::class, 'videosGalery']);

    Route::get('/exchange', [UserFront::class, 'exchange'])->name('user.exchange');

    Route::get('/history', [UserFront::class, 'history']);

    Route::get('/fq', [UserFront::class, 'fq']);
});
