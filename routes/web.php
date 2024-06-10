<?php

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\setInformation;
use App\Http\Controllers\Web\EducationViewController;
use App\Http\Controllers\Web\ExperienceViewController;
use App\Http\Controllers\Web\FormSubmitController;
use App\Http\Controllers\Web\InformationViewController;
use App\Http\Controllers\Web\SetactivesController;
use App\Http\Controllers\Web\TemplateController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';
Route::get('/login-page', function () {
    return view('login.index');
    })->name("login_page");
    Route::get('/register-page', function () {
        return view('register.index');
        })->name('register_page');
    Route::put('set-active/{id}/information', [SetactivesController::class, 'setInformation']);

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name("home");
    Route::resource('information', InformationViewController::class);

    Route::get('/education', function () {
        return view('education');
    })->name("education");
    Route::get('/experience', function () {
        return view('experience');
    })->name("experience");
    Route::get('/social-media', function () {
        return view('social_media');
    })->name("social_media");
    Route::resource('education', EducationViewController::class);
    Route::resource('experience', ExperienceViewController::class);
});




// Route::fallback(function () {
//     return ResponseFormatter::error(NULL, " Not Valid Route", 422);
// });