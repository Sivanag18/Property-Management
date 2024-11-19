<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'index'])->name('home_page');
Route::post('Home/search',[HomeController::class,'search'])->name('home.search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('contact',[MessageController::class,'index'])->name('contact');
Route::post('contact',[MessageController::class,'store'])->name('contact.store');
Route::get('contact/about',[MessageController::class,'about'])->name('contact.about');
Route::get('search',[SearchController::class,'index'])->name('search.index');
Route::post('filter',[SearchController::class,'filter'])->name('search.filter');
Route::get('/property', [PropertyController::class,'index'])->middleware(['auth', 'verified'])->name('property');
Route::post('/property/store', [PropertyController::class,'store'])->middleware(['auth', 'verified'])->name('property.store');
Route::get('listings',[PropertyController::class,'all_listings'])->name('all listings');
Route::get('view_property/{id}',[PropertyController::class,'view_property'])->name('view_property');


require __DIR__.'/auth.php';

require __DIR__.'/admin.php';
