<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\posController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function(){
    Route::get('pos',[posController::class, 'index'])->name('pos.index');

    //category
    Route::get('category', [categoryController::class, 'index'])->name('category.index');
    Route::post('category/store', [categoryController::class, 'store'])->name('category.store');
    Route::get('category/show', [categoryController::class, 'show'])->name('category.show');
    Route::post('category/edit', [categoryController::class, 'edit'])->name('category.edit');
    Route::get('category/delete', [categoryController::class, 'delete'])->name('category.delete');
    Route::get('category/status', [categoryController::class, 'status'])->name('category.status');
    Route::get('category/search', [categoryController::class, 'search'])->name('category.search');

});
