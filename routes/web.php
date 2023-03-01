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

Route::group(['middleware' => 'auth:user'], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/item/index', [App\Http\Controllers\ItemController::class, 'index'])->name('item.index');
    Route::get('/item/detail/{id}', [App\Http\Controllers\ItemController::class, 'detail'])->name('item.detail');

    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/delete', [App\Http\Controllers\CartController::class, 'delete'])->name('cart.delete');

    Route::get('/address', [App\Http\Controllers\AddressController::class, 'index'])->name('address');
    Route::view('/address/register', 'address/register')->name('address.register');
    Route::post('/address/create', [App\Http\Controllers\AddressController::class, 'create'])->name('address.create');
    Route::get('/address/detail', [App\Http\Controllers\AddressController::class, 'detail'])->name('address.detail');
    Route::post('/address/edit', [App\Http\Controllers\AddressController::class, 'edit'])->name('address.edit');
    Route::post('/address/update', [App\Http\Controllers\AddressController::class, 'update'])->name('address.update');
    Route::post('/address/delete', [App\Http\Controllers\AddressController::class, 'delete'])->name('address.delete');
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

    Route::get('/user/index', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
    Route::get('/user/detail/{userId}', [App\Http\Controllers\Admin\UserController::class, 'detail'])->name('admin.user.detail');

    Route::get('/item/index', [App\Http\Controllers\Admin\ItemController::class, 'index'])->name('admin.item.index');
    Route::get('/item/detail/{id}', [App\Http\Controllers\Admin\ItemController::class, 'detail'])->name('admin.item.detail');
    Route::get('/item/add', [App\Http\Controllers\Admin\ItemController::class, 'add'])->name('admin.item.add');
    Route::post('/item/create', [App\Http\Controllers\Admin\ItemController::class, 'create'])->name('admin.item.create');
    Route::get('/item/edit/{id}', [App\Http\Controllers\Admin\ItemController::class, 'edit'])->name('admin.item.edit');
    Route::post('/item/update', [App\Http\Controllers\Admin\ItemController::class, 'update'])->name('admin.item.update');
});