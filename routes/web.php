<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\UsersController;
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

Route::get('/', fn() => redirect()->route('login'));

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:employee,admin')->name('logout');

Route::group(['middleware' => ['guest:employee', 'guest:admin']], function () {
    Route::get('/login', fn() => view('login'))->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::resource('/requests', RequestsController::class, ['only' => ['index', 'create', 'store']])->middleware('auth');
Route::resource('/users', UsersController::class)->middleware('auth:admin');
