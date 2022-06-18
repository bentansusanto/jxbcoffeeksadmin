<?php

use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(CommentController::class)->group(function(){
    Route::get('/comments','index');
    Route::post('/comments','create');
});

Route::controller(ProductController::class)->group(function(){
    Route::get('/products','index');
    Route::get('/products/{product}','show');
});

Route::controller(CategoryController::class)->group(function(){
    Route::get('/categories','index');
    Route::get('/categories/{category}','show');
});

Route::controller(BlogController::class)->group(function(){
    Route::get('/blogs','index');
    Route::get('/blogs/{blog}','show');
});
