<?php

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

Route::get('/home',function(){

    return view('pages.homepage');
});

// Route::get('/choot',function(){
//     return view('pages.homepage');
// });

Route::post('/add_homepage',[HomepageController::class,'add_homepage']);

Route::get('/login',function(){

    return view('pages.auth.login');
});