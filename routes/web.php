<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [UserController::class, 'index']);
Route::get('all-user', [UserController::class, 'all_user']);
Route::post('user-store', [UserController::class, 'store']);
Route::get('user-edit/{id}', [UserController::class, 'edit']);
Route::post('/user-update/{id}', [UserController::class, 'update']);
Route::get('/user-delete/{id}', [UserController::class, 'delete']);
