<?php

use App\Http\Controllers\BuyController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ParserController;
use App\Http\Middleware\IsAdmin;
use App\Models\Category;
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

    Route::get('/', [ItemsController::class, 'show_all'])->name('welcome');

    Route::get('item/{id}', [ItemsController::class, 'show_item']);

    Route::get('/buy',[BuyController::class,'buy'])->name('buy');

    Route::post('/card',[BuyController::class,'card']);


    //Product card routes

    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

Route::middleware([IsAdmin::class])->group(function () {

    Route::get('/admin', [ItemsController::class, 'admin'])->name('admin');

    Route::post('/save', [ItemsController::class, 'save'])->name('save');

    Route::post('/edit', [ItemsController::class, 'edit'])->name('edit');

    Route::post('/save-category', [ItemsController::class, 'save_category'])->name('save-category');

    Route::get('/delete/{id}', [ItemsController::class, 'delete'])->name('delete');

    Route::get('/delete/category/{id}', [ItemsController::class, 'delete_category'])->name('delete-category');

    Route::get('/edit-categories', [ItemsController::class, 'edit_categories'])->name('edit-categories');

    Route::get('/reset',[ItemsController::class,'reset']);

    //Parser
    Route::get('/parser',function () {return view('parser',['categories' => Category::all()]);})->name('parser');
    Route::post('/parse',[ParserController::class,'parse']);

});

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
