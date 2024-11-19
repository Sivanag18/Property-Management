<?php

use App\Http\Controllers\AdminAuth\AuthenticatedSessionController;
use App\Http\Controllers\AdminAuth\RegisteredUserController;
use App\Http\Controllers\dashboard\AdminController;
use App\Http\Controllers\dashboard\HomeController;
use App\Http\Controllers\dashboard\MsessageController;
use App\Http\Controllers\dashboard\updateController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function (){
    Route::middleware('isAdmin')->group(function (){
        Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
        Route::post('register', [RegisteredUserController::class, 'store']);
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

        Route::get('update/create',[updateController::class,'create'])->name('update.create');

        Route::get('/',[HomeController::class,'index'])->name('index');
        Route::get('dashboard/home',[HomeController::class,'index'])->name('dashboard.home');

        Route::get('admins',[AdminController::class,'index'])->name('admins');
        
        Route::delete('admins/{id}',[AdminController::class,'destroy'])->name('destroy');
       
        Route::post('search',[AdminController::class,'search'])->name('search');

     
        Route::get('users',[UserController::class,'index'])->name('users');
        
        Route::post('user/search',[UserController::class,'search'])->name('user.search');
     
        Route::delete('user/{id}',[UserController::class,'destroy'])->name('user.destroy');

       
        Route::get('messages',[MsessageController::class,'index'])->name('messages');
        
        Route::post('message/search',[MsessageController::class,'search'])->name('message.search');
       
        Route::delete('message/{id}',[MsessageController::class,'destroy'])->name('message.destroy');
       
        Route::get('properties',[PropertyController::class,'all_listings_property_admin'])->name('properties');
        
        Route::post('property/search',[PropertyController::class,'search'])->name('property.search');
   
        Route::delete('property/{id}',[PropertyController::class,'destroy'])->name('property.destroy');
        
        Route::get('view_property/{id}',[PropertyController::class,'admin_view_property'])->name('view_property');

    });
    require __DIR__.'/admin_auth.php';
});


