<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
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
/*Route::get('/', function(){
    return view('admin.home');
});*/

Route::get('/', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('is_admin');
Route::get('/dashboard/exchange/per-day/{from}/{to}', [AdminController::class, 'count_exchanges_per_day'])->middleware('is_admin');
Route::get('/users', [AdminController::class, 'usersIndex'])->middleware('is_admin');
Route::get('/user/details/{id}', [AdminController::class, 'userDetails'])->middleware('is_admin');
Route::get('/user/dreams/{id}', [AdminController::class, 'userDreams'])->middleware('is_admin');
Route::get('/dreams', [AdminController::class, 'dreamsIndex'])->middleware('is_admin');
Route::get('/dreams/details/{date}', [AdminController::class, 'dreamsDetails'])->middleware('is_admin');

