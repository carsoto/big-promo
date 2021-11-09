<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

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
})->name('admin.home')->middleware('is_admin');
*/

Route::get('/users', [AdminController::class, 'usersIndex'])->middleware('is_admin');
Route::get('/dreams', [AdminController::class, 'dreamsIndex'])->middleware('is_admin');
Route::get('/dreams/details/{date}', [AdminController::class, 'dreamsDetails'])->middleware('is_admin');
