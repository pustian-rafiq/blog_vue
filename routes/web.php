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
    return view('site.layouts');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
//this is used for dynamic route changing using vue router
//Route::get('/{anypath}', [HomeController::class, 'index'])->where('any', '.*');

// Route::get('/posts', [PostController::class, 'index']);
// Route::get('/category',[CategoryController::class, 'index']);
//category routes here


//category routes from vuex
Route::post('/add-category', [CategoryController::class, 'store']);
Route::get('/get-categories', [CategoryController::class, 'index']);
Route::get('/get-active-categories', [CategoryController::class, 'getActiveCategories']);
Route::get('/remove-category/{id}', [CategoryController::class, 'destroy']);
Route::get('/edit-category/{slug}', [CategoryController::class, 'edit']);
Route::post('/update-category', [CategoryController::class, 'update']);
//remove all categories using checkbox
Route::post('/categories/remove-items', [CategoryController::class, 'removeItems']);
Route::post('/categories/change-status', [CategoryController::class, 'changeStatus']);



//Post routes from vuex
Route::post('/create-post', [PostController::class, 'store']);
Route::get('/get-posts', [PostController::class, 'index']);
Route::get('/remove-post/{slug}', [PostController::class, 'destroy']);
Route::get('/edit-post/{slug}', [PostController::class, 'edit']);
Route::post('/update-post', [PostController::class, 'update']);
//remove all categories using checkbox
Route::post('/posts/remove-items', [PostController::class, 'removeItems']);
Route::post('/posts/change-status', [PostController::class, 'changeStatus']);


//Routes for frontend part
Route::get('/get-active-top-categories', [CategoryController::class, 'getActiveTopCategories']);
Route::get('/get-all-posts', [PostController::class, 'getAllPosts']);
Route::get('/get-post-details/{slug}', [PostController::class, 'getPostDetails']);
Route::get('/get-category-posts/{slug}', [PostController::class, 'getCategoryPosts']);
