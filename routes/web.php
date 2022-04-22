<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\InfoController as AdminInfoController;

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




Route::get('/', [MainController::class, 'index'])->name('main');
Route::post('/', [MainController::class, 'store'])->name('main.store');
Route::get('/info', [InfoController::class, 'index'])->name('info');
Route::post('/info', [InfoController::class, 'store'])->name('info.store');
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')->name('news.show');
Route::get('/categories', [CategoryController::class, 'index'])->name('cat');
Route::get('/categories/{idi}', [CategoryController::class, 'show'])->name('cat.show');

//Admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
     Route::get('/', AdminController::class)->name('index');
     Route::resource('/categories', AdminCategoryController::class);
     Route::resource('/news', AdminNewsController::class);
     Route::resource('/info', AdminInfoController::class);
    
});


Route::get('collection', function() {
    $array = ["Mike", "Pike", "Ann", "Kate"];
    $collection = collect($array);
    
    dd($collection->sort()->map(function($item) {
        return "Name " . $item;
    }));
});