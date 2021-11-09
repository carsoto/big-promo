<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;

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
Route::get('/', [LoginController::class, 'showLoginForm'])->name('home');

Auth::routes(['verify' => true]);

Route::get('/register/verify/{code}', [LoginController::class, 'verify']);

Route::get('/exchange', function(){
    return "<h2>MÓDULO DE CANJE</h2>";
});

Route::get('/user-not-found', function(){
    return "<h2>USUARIO NO ENCONTRADO</h2>";
});

Route::get('/dreams/upload', [LoginController::class, 'verify']);