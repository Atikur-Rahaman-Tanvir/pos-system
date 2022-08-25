<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\posController;
use App\Http\Controllers\ProductController;
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
    Route::get('categoy/product',[posController::class, 'category_product'])->name('category.product');

    //category
    Route::get('category', [categoryController::class, 'index'])->name('category.index');
    Route::post('category/store', [categoryController::class, 'store'])->name('category.store');
    Route::get('category/show', [categoryController::class, 'show'])->name('category.show');
    Route::post('category/edit', [categoryController::class, 'edit'])->name('category.edit');
    Route::get('category/delete', [categoryController::class, 'delete'])->name('category.delete');
    Route::get('category/status', [categoryController::class, 'status'])->name('category.status');
    Route::get('category/search', [categoryController::class, 'search'])->name('category.search');

    //Product
    Route::get('product', [ProductController::class, 'index'])->name('product.index');
    Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('product/show', [ProductController::class, 'show'])->name('product.show');
    Route::post('product/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('product/delete', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('product/status', [ProductController::class, 'status'])->name('product.status');
    Route::get('product/search', [ProductController::class, 'search'])->name('product.search');

    // add to cart
    Route::get('add/to/cart', [CartController::class, 'add'])->name('add.to.cart');
    Route::post('add/customer', [CartController::class, 'add_customer'])->name('customer.add');
    Route::get('test', [CartController::class, 'test'])->name('test');

    Route::get('customer/name',[CartController::class, 'customer_name'])->name('customer.name');
    Route::get('customer/number',[CartController::class, 'customer_number'])->name('customer.number');


});
