<?php
use App\Http\Controllers\PostController;
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

// Route::middleware(["auth"])->group(function(){

// Route::get('/posts',[PostController::class,'index']);
// Route::get('/posts',[PostController::class,'index']);
// Route::get('/posts/create',[PostController::class,'create']);
// Route::post('/posts',[PostController::class,'store']);
// Route::get('/posts/{id}',[PostController::class,'show']);
// Route::get('/posts/{id}/edit',[PostController::class,'edit']);
// Route::put('/posts/{id}', [PostController::class, 'update']);
// Route::delete('/posts/{id}', [PostController::class, 'destroy']);
// });

Route::resource("posts", PostController::class)->middleware("auth");
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
