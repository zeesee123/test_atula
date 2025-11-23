<?php

use App\Models\Testpage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PapayaController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\AboutpageController;
use App\Http\Controllers\EventpageController;
use App\Http\Controllers\CareerpageController;
use App\Http\Controllers\AgriventureController;
use App\Http\Controllers\GallerypageController;
use App\Http\Controllers\BusinesspageController;
use App\Http\Controllers\TrainingpageController;
use App\Http\Controllers\AgriventurepageController;
use App\Http\Controllers\ContractfarmingController;
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


Route::get('/testpage',function(){
    $model=Testpage::first()??null;
    return view('pages.testpage',compact('model'));});

Route::get('/load_tables',[TestController::class,'loadtable']);

Route::post('/test_submit',[TestController::class,'submit_pg']);

Route::group(['prefix'=>'admin'],function(){

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
    
        Route::get('/contract-farming',[PageController::class,'contractfarming']);
    
        Route::get('/training-and-dev',[PageController::class,'trainingNdev']);
    
        Route::get('/bamboo',[PageController::class,'bamboo']);
    
        Route::get('/fruits-and-vegetables',[PageController::class,'fruitsNveggies']);
    
        Route::get('/papaya',[PageController::class,'papaya']);
    
    
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
        Route::post('/add_agroforestrypage',[AgroforestrypageController::class,'add_agroforestry']);
    
        Route::get('/agroforestrytable/{section}',[AgroforestrypageController::class,'loadtable']);
    
        Route::get('/get_resource_agroforestry/{type}/{id}',[AgroforestrypageController::class,'get_resource']);
    
        Route::post('/update_agroforestrysection/{sectionType}',[AgroforestrypageController::class,'update_resource']);
    
        Route::post('/remove_agroforestrysection/{sectionType}',[AgroforestrypageController::class,'delete_resource']);
    // riders of the storm
        //routes for businesspage
        Route::post('/add_businesspage',[BusinesspageController::class,'add_businesspage']);
    
        Route::get('/businesstable/{section}',[BusinesspageController::class,'loadtable']);
    
        Route::get('/get_resource_business/{type}/{id}',[BusinesspageController::class,'get_resource']);
    
        Route::post('/update_businesssection/{sectionType}',[BusinesspageController::class,'update_resource']);
    
        Route::post('/remove_businesssection/{sectionType}',[BusinesspageController::class,'delete_resource']);
    
        //routes for ecoinitiative
        Route::post('/add_ecoinitiativepage',[EcoinitiativepageController::class,'add_ecoinitiative']);
    
        Route::get('/ecoinitiativetable/{section}',[EcoinitiativepageController::class,'loadtable']);
    
        Route::get('/get_resource_ecoinitiative/{type}/{id}',[EcoinitiativepageController::class,'get_resource']);
    
        Route::post('/update_ecoinitiativesection/{sectionType}',[EcoinitiativepageController::class,'update_resource']);
    
        Route::post('/remove_ecoinitiativesection/{sectionType}',[EcoinitiativepageController::class,'delete_resource']);
    
        //routes for CONTRACT FARMING
        Route::post('/add_contractfarmingpage',[ContractfarmingController::class,'addpage']);
    
        Route::get('/contractfarmingtable/{section}',[ContractfarmingController::class,'loadtable']);
    
        Route::get('/get_resource_contractfarming/{type}/{id}',[ContractfarmingController::class,'get_resource']);
    
        Route::post('/update_contractfarmingsection/{sectionType}',[ContractfarmingController::class,'update_resource']);
    
        Route::post('/remove_contractfarmingsection/{sectionType}',[ContractfarmingController::class,'delete_resource']);
    
        //routes for training and development
        Route::post('/add_trainingndevpage',[TrainingpageController::class,'addpage']);
    
        Route::get('/trainingndevtable/{section}',[TrainingpageController::class,'loadtable']);
    
        Route::get('/get_resource_trainingndev/{type}/{id}',[TrainingpageController::class,'get_resource']);
    
        Route::post('/update_trainingndevsection/{sectionType}',[TrainingpageController::class,'update_resource']);
    
        Route::post('/remove_trainingndevsection/{sectionType}',[TrainingpageController::class,'delete_resource']);
    
        //routes for papaya page
        Route::post('/add_papaya',[PapayaController::class,'addpage']);
        Route::get('/papayatable/{section}',[PapayaController::class,'loadtable']);
        Route::get('/get_resource_papaya/{type}/{id}',[PapayaController::class,'get_resource']);
        Route::post('/update_papayasection/{sectionType}',[PapayaController::class,'update_resource']);

        //routes for adding in the blogs
        Route::get('/add_blog',[PageController::class,'addblog']);
        Route::get('/edit_blog/{id}',[PageController::class,'editblog']);
         Route::get('/view_blogs',[PageController::class,'viewblogs']);


         // routes for Team Page (CMS)
Route::get('/add_team', [PageController::class, 'addteam']);
Route::get('/edit_team/{id}', [PageController::class, 'editteam']);
Route::get('/view_team', [PageController::class, 'viewteam']);

// TEAM ROUTES
Route::post('/team/create', [TeamController::class, 'addteam']);
Route::post('/edit_team/{id}', [TeamController::class, 'editteam']);

Route::get('/get_teams', [TeamController::class, 'loadteamtable']);

Route::delete('/delete_team/{id}', [TeamController::class, 'delete_team']);


        //blogs route
        Route::post('/blog/create',[BlogController::class,'addblog']);
        Route::post('/edit_blog/{id}',[BlogController::class,'editblog']);
        
        Route::get('/get_blogs',[BlogController::class,'loadtable']);

        Route::delete('/delete_blog/{id}', [BlogController::class, 'delete_blog']);

        //users table
        Route::get('/users',[PageController::class,'listusers']);

        //event page
        Route::get('/eventpage',[PageController::class,'eventpage']);
        Route::post('/eventpage',[EventpageController::class,'event']);

        //gallery page
        Route::get('/gallery',[PageController::class,'gallerypage']);
        Route::post('/add/gallerypage',[GallerypageController::class,'store']);

        //==gallery category
        Route::get('/add_category_gallery',[PageController::class,'gallerypage_category']);
        Route::post('/add_category_gallery',[GallerypageController::class,'gallerypage_category']);
        
        Route::get('/view_category_gallery',[PageController::class,'gallerypage_category']);
        Route::get('/delete_category_gallery',[PageController::class,'gallerypage_category']);
        Route::get('/edit_category_gallery',[PageController::class,'gallerypage_category']);
        Route::post('/admin/add/gallery_category',[GallerypageController::class,'add_category']);
        
        //images gallery part
        Route::get('/galleryimages',[PageController::class,'gallery_images']);
        Route::post('/add/gallery_images',[GalleryPageController::class,'gallery_images']);
        Route::get('/view_gallery_images',[PageController::class,'view_galleryimages']);
        Route::get('/gallery_table/{category_id}',[GalleryPageController::class,'loadtable_galleryimages']);
        Route::get('/edit_galleryimage/{id}',[PageController::class,'edit_galleryimage']);
        Route::put('/update_galleryimage/{id}',[GallerypageController::class,'update_image']);
        Route::post('/view_gallery_images',[GallerypageController::class,'add_galleryimages']);
        Route::post('/edit_gallery_images',[GallerypageController::class,'add_galleryimages']);
        Route::delete('/delete_galleryimage/{id}', [GallerypageController::class, 'delete_image']);
        
        //careers page
        Route::get('/careerpage',[PageController::class,'careerpage']);
        Route::post('/careerpage',[CareerpageController::class,'store']);
        Route::get('/add_careers',[PageController::class,'add_jobs']);
        Route::post('/add_careers',[CareerpageController::class,'add_job']);

        Route::get('/view_jobs',[PageController::class,'view_jobs']);
        Route::get('/careers/loadtable',[CareerpageController::class,'loadtable']);
        Route::get('/careers/edit/{id}', [PageController::class, 'edit_job']);      // edit page
Route::delete('/careers/delete/{id}', [CareerpageController::class, 'delete']); // delete ajax
Route::post('/careers/update/{id}', [CareerpageController::class, 'update']);  // update from edit
        // Route::get('/view_jobs',[CareerpageController::class,'view_jobs']);
        // Route::get('/edit/job',[CareerpageController::class,'edit_job']);
        // Route::get('/delete/job',[CareerpageController::class,'remove_job']);
        //Route::post('/admin/add/gallery_category',[GallerypageController::class,'add_category']);

        
    });
    
});



