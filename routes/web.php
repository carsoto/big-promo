<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Api\GeneralController;
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

Route::prefix('u')->group(function () {
    Route::get('/login', function () {
        return view('user.auth.login');
    });

    Route::get('/register', function () {
        return view('user.auth.register');
    });

    Route::get('/recorder', function () {
        return view('user.recorder');
    });

    Route::get('/videos-galery', function () {
        return view('user.videos');
    });

    Route::get('/exchange', function () {
        return view('user.exchange');
    })->name('user.exchange');

    Route::get('/fq', function () {
        return view('user.fq');
    });

    Route::get('/history', function () {
        return view('user.history');
    });
});