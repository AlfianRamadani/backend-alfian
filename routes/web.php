<?php

use App\Helpers\ResponseFormatter;

use App\Http\Controllers\Web\SocialMediaViewController;
use App\Http\Controllers\Web\EducationViewController;
use App\Http\Controllers\Web\ExperienceViewController;
use App\Http\Controllers\Web\InformationViewController;
use App\Http\Controllers\Web\ProjectViewController;
use App\Http\Controllers\Web\SetactivesController;
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

    Route::resource('education', EducationViewController::class);
    Route::resource('experience', ExperienceViewController::class);
    Route::resource('social-media', SocialMediaViewController::class);
    Route::resource('form', SocialMediaViewController::class);
    Route::resource('project', ProjectViewController::class);
    
});




Route::fallback(function () {
    return ResponseFormatter::error(NULL, " Not Valid Route", 422);
});