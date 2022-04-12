<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

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
    return view('hello');
});

Route::get('/info', function () {
    return view('info');
});

Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')->name('news.show');
Route::get('/categories', [CategoryController::class, 'index'])->name('cat');
Route::get('/categories/{idi}', [CategoryController::class, 'show'])->name('cat.show');

//Admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
     Route::resource('/categories', AdminCategoryController::class);
     Route::resource('/news', AdminNewsController::class);
});