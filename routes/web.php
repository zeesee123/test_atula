<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\AboutpageController;
use App\Http\Controllers\AgriventureController;
use App\Http\Controllers\BusinesspageController;
use App\Http\Controllers\AgriventurepageController;
use App\Http\Controllers\AgroforestrypageController;
use App\Http\Controllers\EcoinitiativepageController;


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

    if(Auth::check()){

        return view('pages.index');

    }else{

        return view('pages.auth.login');
    }

    
})->name('login');




Route::post('/login',[AuthController::class,'login']);

Route::group(['middleware'=>['auth']],function(){

    Route::post('/logout',[AuthController::class,'logout']);

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

    //routes for aboutpage
    Route::post('/add_aboutpage',[AboutpageController::class,'add_aboutpage']);

    Route::get('/abouttable/{section}',[AboutpageController::class,'loadtable']);

    Route::get('/get_resource_about/{type}/{id}',[AboutpageController::class,'get_resource']);

    Route::post('/update_aboutsection/{sectionType}',[AboutpageController::class,'update_resource']);

    Route::post('/remove_aboutsection/{sectionType}',[AboutpageController::class,'delete_resource']);

    //routes for AnMagriventure
    Route::post('/add_agriventurepage',[AgriventurepageController::class,'add_agriventure']);

    Route::get('/agriventuretable/{section}',[AgriventurepageController::class,'loadtable']);

    Route::get('/get_resource_agriventure/{type}/{id}',[AgriventurepageController::class,'get_resource']);

    Route::post('/update_agriventuresection/{sectionType}',[AgriventurepageController::class,'update_resource']);

    Route::post('/remove_agriventuresection/{sectionType}',[AgriventurepageController::class,'delete_resource']);

    //routes for agroforestry
    Route::post('/add_agroforestrypage',[AgriventurepageController::class,'add_aboutpage']);

    Route::get('/agroforestrytable/{section}',[HomepageController::class,'loadtable']);

    Route::get('/get_resource_agroforestry/{type}/{id}',[HomepageController::class,'get_resource']);

    Route::post('/update_agroforestrysection/{sectionType}',[HomepageController::class,'update_resource']);

    Route::post('/remove_agroforestrysection/{sectionType}',[HomepageController::class,'delete_resource']);

    //routes for businesspage
    Route::post('/add_businessenturepage',[AgriventurepageController::class,'add_aboutpage']);

    Route::get('/businesstable/{section}',[HomepageController::class,'loadtable']);

    Route::get('/get_resource_business/{type}/{id}',[HomepageController::class,'get_resource']);

    Route::post('/update_businesssection/{sectionType}',[HomepageController::class,'update_resource']);

    Route::post('/remove_businesssection/{sectionType}',[HomepageController::class,'delete_resource']);

    //routes for ecoinitiative
    Route::post('/add_ecoinitiativepage',[AgriventurepageController::class,'add_aboutpage']);

    Route::get('/ecoinitiativetable/{section}',[HomepageController::class,'loadtable']);

    Route::get('/get_resource_ecoinitiative/{type}/{id}',[HomepageController::class,'get_resource']);

    Route::post('/update_ecoinitiativesection/{sectionType}',[HomepageController::class,'update_resource']);

    Route::post('/remove_ecoinitiativesection/{sectionType}',[HomepageController::class,'delete_resource']);

});



