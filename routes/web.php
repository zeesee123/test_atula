<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//dashboard route
Route::get('/',function(){

    return view('pages.index');
});

Route::get('/home',[PageController::class,'index']);

Route::get('/about',[PageController::class,'about']);

Route::get('/agroforestry',[PageController::class,'agroforestry']);

Route::get('/about-two',[PageController::class,'about_two']);

Route::get('/business',[PageController::class,'business']);

Route::get('/eco-initiative',[PageController::class,'eco_initiative']);



//routes for homepage
Route::post('/add_homepage',[HomepageController::class,'add_homepage']);
//routes for changing in the stuff
Route::get('/hometable/{section}',[HomepageController::class,'loadtable']);

Route::get('/get_resource/{type}/{id}',[HomepageController::class,'get_resource']);

Route::post('/update_homesection/{sectionType}',[HomepageController::class,'update_resource']);

Route::post('/remove_homesection/{sectionType}',[HomepageController::class,'delete_resource']);

Route::get('/login',function(){

    return view('pages.auth.login');
});