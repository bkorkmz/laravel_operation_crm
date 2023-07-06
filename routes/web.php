<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\SystemController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::domain('{subdomain}.laravel_operation_crm.test')->group(function () {
    Route::get('/', function ($subdomain) {
        // Subdomain verisini kullanarak işlemler yapabilirsiniz
        return 'Subdomain: ' . $subdomain;
    });
});


Route::get('/', function () {
    return redirect(route('login'));
})->name('frontend.index');


Route::get('lang/{locale}', [LanguageController::class, 'swap']);

Auth::routes();
Route::prefix('backend')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/sehirler', [HomeController::class, 'cities'])->name('sehirler');


    Route::controller(UserController::class)->prefix('user')->group(function(){
        $module_name = 'user';
        Route::get('/', 'index')->name($module_name.'.index')->middleware('permission:view_users');
        Route::get('/index_data', 'index_data')->name($module_name.'.index_data')->middleware('permission:view_users');
        Route::get('/create', 'create')->name($module_name.'.create')->middleware('permission:add_users');
        Route::post('/create', 'store')->name($module_name.'.store')->middleware('permission:add_users');
        Route::get('/edit/{id}', 'edit')->name($module_name.'.edit')->middleware('permission:edit_users');
        Route::post('/edit/{id}', 'update')->name($module_name.'.update')->middleware('permission:edit_users');
        Route::get('/delete/{id}', 'destroy')->name($module_name.'.destroy')->middleware('permission:delete_users');
        Route::get('/trashed/{id}', 'trashed')->name($module_name.'.trashed')->middleware('permission:delete_users');
        Route::get('/trash', 'trashed_index')->name($module_name.'.trashed_index')->middleware('permission:view_trashed_users');
        Route::get('/restored/{id}', 'restore')->name($module_name.'.restore')->middleware('permission:restore_users');
    });
//
    Route::controller(ProductsController::class)->prefix('product')->group(function(){
        $module_name = 'product';
        Route::get('/', 'index')->name($module_name.'.index')->middleware('permission:view_product');
        Route::get('/index_data', 'index_data')->name($module_name.'.index_data')->middleware('permission:view_product');
        Route::get('/create', 'create')->name($module_name.'.create')->middleware('permission:add_product');
        Route::post('/create', 'store')->name($module_name.'.store')->middleware('permission:add_product');
        Route::get('/edit/{products}', 'edit')->name($module_name.'.edit')->middleware('permission:edit_product');
        Route::post('/edit/{products}', 'update')->name('product.update')->middleware('permission:edit_product');
        Route::get('/delete/{products}', 'destroy')->name($module_name.'.destroy')->middleware('permission:delete_product');
        Route::get('/trashed', 'trashed')->name($module_name.'.trashed')->middleware('permission:delete_product');
        Route::get('/trashed_index', 'trashed_index')->name($module_name.'.trashed_index')->middleware('permission:view_trashed_product');
        Route::get('/trashed_data', 'trashed_data')->name($module_name.'.trashed_data')->middleware('permission:view_trashed_product');
        Route::get('/restored/{products}', 'restore')->name($module_name.'.restored')->middleware('permission:restore_product');
    });
    
    
    Route::controller(RolesController::class)->prefix('roles')->group(function(){
        $module_name = 'roles';
        Route::get('/', 'index')->name($module_name.'.index');
        Route::get('/index_data', 'index_data')->name($module_name.'.index_data')->middleware('permission:view_roles');
        Route::get('/create', 'create')->name($module_name.'.create')->middleware('permission:add_roles');
        Route::post('/create', 'store')->name($module_name.'.store')->middleware('permission:add_roles');
        Route::get('/edit/{role}', 'edit')->name($module_name.'.edit')->middleware('permission:edit_roles');
        Route::post('/edit/{role}', 'update')->name($module_name.'.update')->middleware('permission:edit_roles');
        Route::get('/delete/{role}', 'destroy')->name($module_name.'.destroy')->middleware('permission:delete_roles');
        Route::get('/trashed', 'trashed')->name($module_name.'.trashed')->middleware('permission:delete_roles');
        Route::get('/trashed_index', 'trashed_index')->name($module_name.'.trashed_index')->middleware('permission:view_trashed_roles');
        Route::get('/trashed_data', 'trashed_data')->name($module_name.'.trashed_data')->middleware('permission:view_trashed_roles');
        Route::get('/restored/{role}', 'restore')->name($module_name.'.restored')->middleware('permission:restore_roles');
    });
    
    
    
    Route::controller(SystemController::class)->prefix('settings')->group(function(){
        $module_name = 'settings';
        Route::get('/', 'index')->name($module_name.'.index')->middleware('permission:view_settings');
//        Route::get('/index_data', 'index_data')->name($module_name.'.index_data');
        Route::get('/create', 'create')->name($module_name.'.create')->middleware('permission:create_settings');
        Route::post('/create', 'store')->name($module_name.'.store')->middleware('permission:create_settings');
        Route::get('/edit/{id}', 'edit')->name($module_name.'.edit')->middleware('permission:edit_settings');
        Route::post('/edit/{id?}', 'update')->name($module_name.'.update')->middleware('permission:update_settings');
//        Route::get('/delete/{id}', 'destroy')->name($module_name.'.destroy');
//        Route::get('/trashed/{id}', 'trashed')->name($module_name.'.trashed');
//        Route::get('/trashed_index', 'trashed_index')->name($module_name.'.trashed_index');
//        Route::get('/trashed_data', 'trashed_data')->name($module_name.'.trashed_data');
//        Route::get('/restored/{id}', 'restore')->name($module_name.'.restored');
    });
    
    
    
    // // 
    // Route::controller(DriverController::class)->prefix('driver')->group(function(){
    //     $module_name = 'driver';
    //     Route::get('/', 'index')->name($module_name.'.index');
    //     Route::get('/index_data', 'index_data')->name($module_name.'.index_data');
    //     Route::get('/create', 'create')->name($module_name.'.create');
    //     Route::post('/create', 'store')->name($module_name.'.store');
    //     Route::get('/edit/{id}', 'edit')->name($module_name.'.edit');
    //     Route::post('/edit/{id}', 'update')->name($module_name.'.update');
    //     Route::get('/delete/{id}', 'destroy')->name($module_name.'.destroy');
    //     Route::get('/trashed/{id}', 'trashed')->name($module_name.'.trashed');
    //     Route::get('/trashed_index', 'trashed_index')->name($module_name.'.trashed_index');
    //     Route::get('/trashed_data', 'trashed_data')->name($module_name.'.trashed_data');
    //     Route::get('/restored/{id}', 'restore')->name($module_name.'.restored');
    // });




    // Route::controller(WayArrivalController::class)->prefix('way_arrival')->group(function(){
    //     $module_name = 'way_arrival';
    //     Route::get('/', 'index')->name($module_name.'.index');
    //     Route::get('/index_data', 'index_data')->name($module_name.'.index_data');
    //     Route::get('/create', 'create')->name($module_name.'.create');
    //     Route::post('/create', 'store')->name($module_name.'.store');
    //     Route::get('/edit/{id}', 'edit')->name($module_name.'.edit');
    //     Route::post('/edit/{id}', 'update')->name($module_name.'.update');
    //     Route::get('/delete/{id}', 'destroy')->name($module_name.'.destroy');
    //     Route::get('/trashed/{id}', 'trashed')->name($module_name.'.trashed');
    //     Route::get('/trashed_index', 'trashed_index')->name($module_name.'.trashed_index');
    //     Route::get('/trashed_data', 'trashed_data')->name($module_name.'.trashed_data');
    //     Route::get('/restored/{id}', 'restore')->name($module_name.'.restored');
    // });


    // Route::controller(WayArrivalAttractionController::class)->prefix('way_arrival_attraction')->group(function(){
    //     $module_name = 'way_arrival_attraction';
    //     Route::get('/', 'index')->name($module_name.'.index');
    //     Route::get('/index_data', 'index_data')->name($module_name.'.index_data');
    //     Route::get('/create', 'create')->name($module_name.'.create');
    //     Route::post('/create', 'store')->name($module_name.'.store');
    //     Route::get('/edit/{id}', 'edit')->name($module_name.'.edit');
    //     Route::post('/edit/{id}', 'update')->name($module_name.'.update');
    //     Route::get('/delete/{id}', 'destroy')->name($module_name.'.destroy');
    //     Route::get('/trashed/{id}', 'trashed')->name($module_name.'.trashed');
    //     Route::get('/trashed_index', 'trashed_index')->name($module_name.'.trashed_index');
    //     Route::get('/trashed_data', 'trashed_data')->name($module_name.'.trashed_data');
    //     Route::get('/restored/{id}', 'restore')->name($module_name.'.restored');
    // });




});


//Route::get('/home', [HomeController::class, 'index'])->name('home');


