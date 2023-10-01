<?php

use App\Http\Controllers\WelcomePageController;
use Illuminate\Support\Facades\Route;




Route::middleware(['auth'])->group(function () {
	Route::get('apply-online/{job}', [WelcomePageController::class, 'applyOnline'])->name('applyonline');
	Route::get('applied-jobs', [WelcomePageController::class, 'appliedJobs'])->name('appliedjobs');
});

Route::get('/cvs', [WelcomePageController::class, 'cvs'])->name('cvs');
Route::get('/coverletter', [WelcomePageController::class, 'coverLetters'])->name('coverletters');
Route::get('/events', [WelcomePageController::class, 'events'])->name('events');
Route::get('/events/{event}', [WelcomePageController::class, 'eventDetails'])->name('eventdetails');
Route::get('/programs/{program}', [WelcomePageController::class, 'programDetails'])->name('programdetails');
Route::get('/programs', [WelcomePageController::class, 'programs'])->name('programs');
Route::get('/jobs', [WelcomePageController::class, 'jobPortal'])->name('jobportals');
Route::get('/jobs/{job}', [WelcomePageController::class, 'jobDetails'])->name('jobdetails');



