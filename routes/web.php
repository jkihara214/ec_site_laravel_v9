<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::controller(App\Http\Controllers\ItemController::class)->group(function () {
    Route::get('/item/index', 'index')->name('item.index');
    Route::get('/item/detail/{id}', 'detail')->name('item.detail');
});

Route::group(['prefix' => 'admin'], function() {
    Route::view('/login', 'admin/login')->name('admin.login');
    Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login']);
    Route::view('/register', 'admin/register')->name('admin.register');
    Route::post('/register', [App\Http\Controllers\Admin\RegisterController::class, 'register']);
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('/logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin.logout');
    Route::view('/home', 'admin/home')->name('admin.home');
    Route::get('/item/index', [App\Http\Controllers\Admin\ItemController::class, 'index'])->name('admin.item.index');
    Route::get('/item/detail/{id}', [App\Http\Controllers\Admin\ItemController::class, 'detail'])->name('admin.item.detail');
    Route::get('/item/add', [App\Http\Controllers\Admin\ItemController::class, 'add'])->name('admin.item.add');
    Route::post('/item/create', [App\Http\Controllers\Admin\ItemController::class, 'create'])->name('admin.item.create');
});