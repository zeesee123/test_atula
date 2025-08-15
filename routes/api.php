<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestController;
use App\Http\Controllers\api\PageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::group()

Route::get('/homepage_content',[TestController::class,'index']);

Route::get('/homepage',[PageController::class,'index']);

Route::get('/blogs',[PageController::class,'blogs']);

Route::get('/blogs/{slug}', [PageController::class, 'blogBySlug']);

Route::get('/eventpage',[PageController::class,'eventpage']);