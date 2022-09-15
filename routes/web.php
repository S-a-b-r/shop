<?php

use App\Http\Controllers\BreweryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;
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

Route::get('/', \App\Http\Controllers\Main\IndexController::class)->name('main.index');

Route::prefix('/categories')->controller(CategoryController::class)->group(function () {
    Route::get('/','index')->name('categories.index');
    Route::get('/create','create')->name('categories.create');
    Route::post('/', 'store')->name('categories.store');
    Route::get('/{category}', 'show')->name('categories.show');
    Route::get('/{category}/edit', 'edit')->name('categories.edit');
    Route::patch('/{category}', 'update')->name('categories.update');
    Route::delete('/{category}', 'destroy')->name('categories.destroy');
});

Route::prefix('/tags')->controller(TagController::class)->group(function () {
    Route::get('/','index')->name('tags.index');
    Route::get('/create','create')->name('tags.create');
    Route::post('/', 'store')->name('tags.store');
    Route::get('/{tag}', 'show')->name('tags.show');
    Route::get('/{tag}/edit', 'edit')->name('tags.edit');
    Route::patch('/{tag}', 'update')->name('tags.update');
    Route::delete('/{tag}', 'destroy')->name('tags.destroy');
});

Route::prefix('/breweries')->controller(BreweryController::class)->group(function () {
    Route::get('/','index')->name('breweries.index');
    Route::get('/create','create')->name('breweries.create');
    Route::post('/', 'store')->name('breweries.store');
    Route::get('/{brewery}', 'show')->name('breweries.show');
    Route::get('/{brewery}/edit', 'edit')->name('breweries.edit');
    Route::patch('/{brewery}', 'update')->name('breweries.update');
    Route::delete('/{brewery}', 'destroy')->name('breweries.destroy');
});

Route::prefix('/users')->controller(UserController::class)->group(function () {
    Route::get('/','index')->name('users.index');
    Route::get('/create','create')->name('users.create');
    Route::post('/', 'store')->name('users.store');
    Route::get('/{user}', 'show')->name('users.show');
    Route::get('/{user}/edit', 'edit')->name('users.edit');
    Route::patch('/{user}', 'update')->name('users.update');
    Route::delete('/{user}', 'destroy')->name('users.destroy');
});

Route::prefix('/products')->controller(ProductController::class)->group(function () {
    Route::get('/','index')->name('products.index');
    Route::get('/create','create')->name('products.create');
    Route::post('/', 'store')->name('products.store');
    Route::get('/{product}', 'show')->name('products.show');
    Route::get('/{product}/edit', 'edit')->name('products.edit');
    Route::patch('/{product}', 'update')->name('products.update');
    Route::delete('/{product}', 'destroy')->name('products.destroy');
});
