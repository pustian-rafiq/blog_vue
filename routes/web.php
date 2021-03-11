<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');
//this is used for dynamic route changing using vue router
Route::get('/{anypath}', [HomeController::class, 'index'])->where('any', '.*');

// Route::get('/posts', [PostController::class, 'index']);
// Route::get('/category',[CategoryController::class, 'index']);
//category routes here
Route::post('/create-category', [CategoryController::class, 'store'])->name('create-category');
