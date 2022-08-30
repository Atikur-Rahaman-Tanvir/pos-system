<?php

use App\Http\Controllers\BalanceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\Expenceses;
use App\Http\Controllers\posController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
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
    Route::get('all/product', [posController::class, 'all_product'])->name('product.all');
    Route::get('pos/product/search', [posController::class, 'product_search'])->name('pos.product.search');

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
    Route::get('product/print', [ProductController::class, 'print'])->name('product.print');



    Route::get('bill',[ReportController::class, 'bill'])->name('bill');
    Route::get('bill/fetch',[ReportController::class, 'bill_fetch'])->name('bill.fetch');
    Route::get('bill/search',[ReportController::class, 'bill_search'])->name('bill.search');
    Route::get('bill/invoice',[ReportController::class, 'bill_invoice'])->name('bill.invoice');
    Route::get('bill/delete',[ReportController::class, 'bill_delete'])->name('bill.delete');

    Route::get('report', [ReportController::class, 'report'])->name('report');
    Route::get('monthly/report', [ReportController::class, 'monthly_report'])->name('monthly.report');
    Route::get('yearly/report', [ReportController::class, 'yearly_report'])->name('yearly.report');



    // add to cart
    Route::get('add/to/cart', [CartController::class, 'add'])->name('add.to.cart');
    Route::post('add/customer', [CartController::class, 'add_customer'])->name('customer.add');
    Route::get('test', [CartController::class, 'test'])->name('test');

    Route::get('customer/name',[CartController::class, 'customer_name'])->name('customer.name');
    Route::get('customer/number',[CartController::class, 'customer_number'])->name('customer.number');

    //Expenceses
    Route::get('expencese', [Expenceses::class, 'index'])->name('expencese.index');
    Route::post('expencese/store', [Expenceses::class, 'store'])->name('expencese.store');
    Route::get('expencese/show', [Expenceses::class, 'show'])->name('expencese.show');
    Route::post('expencese/edit', [Expenceses::class, 'edit'])->name('expencese.edit');
    Route::get('expencese/delete', [Expenceses::class, 'delete'])->name('expencese.delete');;
    Route::get('expencese/search', [Expenceses::class, 'search'])->name('expencese.search');
    Route::get('expencese/print', [Expenceses::class, 'print'])->name('expencese.print');

    //Expencese Report
    Route::get('expencese/report', [Expenceses::class, 'report'])->name('expencese.report');
    Route::get('expencese/monthly/report', [Expenceses::class, 'monthly_report'])->name('expencese.monthly.report');
    Route::get('expencese/yearly/report', [Expenceses::class, 'yearly_report'])->name('expencese.yearly.report');



});
