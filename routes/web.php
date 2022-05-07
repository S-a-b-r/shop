<?php

use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', \App\Http\Controllers\Main\IndexController::class)->name('main.index');

Route::prefix('/categories')->controller(CategoryController::class)->group(function () {
    Route::get('/','index')->name('categories.index');
    Route::get('/create','create')->name('categories.create');
    Route::post('/', 'store')->name('categories.store');
    Route::get('/{category}', 'show')->name('categories.show');
    Route::get('/{category}/edit', 'edit')->name('categories.edit');
    Route::patch('/{category}', 'update')->name('categories.update');
    Route::delete('/{category}', 'destroy')->name('categories.destroy');
});
