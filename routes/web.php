<?php

use App\Http\Controllers\PagesController;
use App\Models\Category;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/reset',function () {
    Artisan::call('db:wipe');
    Artisan::call('migrate:fresh');
    Artisan::call('db:seed');
    return redirect('/');
});

Route::get('/',[PagesController::class,'index'])->name('welcome');
Route::get('/category/{name}',[PagesController::class,'category']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
