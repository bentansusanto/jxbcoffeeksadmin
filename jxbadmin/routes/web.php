<?php

use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
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
//     return view('index');
// });

Route::resource('/products',ProductController::class);
Route::resource('/categories',CategoryController::class);
Route::controller(CommentController::class)->group(function(){
    Route::get('/comments','index');
    Route::delete('/comments/{comment}','destroy');
});

Route::controller(LoginController::class)->group(function(){
        Route::get('/login','adminLogin');
        Route::post('/login','login');
});

Route::controller(RegisterController::class)->group(function(){
        Route::get('/register','adminRegister');
        Route::post('/register','register');
        Route::post('/logout','logout');
});

// Route::resource('/products', ProductController::class);
