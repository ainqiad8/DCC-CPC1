<?php

use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CoverletterController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExperticeLevelController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobTypeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;




Route::middleware(['auth','admin'])->group(function () {
	
	Route::get('',[AdminPageController::class,'index'])->name('home.sdfsd');
	Route::resource('events',EventController::class);
	Route::resource('programs',ProgramController::class);
	Route::resource('jobs',JobController::class);
	Route::resource('users',UserController::class);
	Route::resource('carousels',CarouselController::class);
	Route::resource('photos',PhotoController::class);
	Route::get('jobs/{job}/applicants',[JobController::class,'applicants'])->name('jobs.applicants');
	Route::get('/', function () {
		return view('backend.index');
	});


	Route::resource('categories', CategoryController::class);
	Route::resource('cvs', CvController::class);
	Route::resource('coverletters', CoverletterController::class);
	Route::resource('jobtypes', JobTypeController::class);
	Route::resource('experticeslevel', ExperticeLevelController::class);
});

