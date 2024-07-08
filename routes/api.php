<?php

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\EducationController;
use App\Http\Controllers\Api\ExperienceController;
use App\Http\Controllers\Api\FormController;
use App\Http\Controllers\Api\InformationController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProjectsController;
use App\Http\Controllers\Api\SocialMediaController;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/information', [informationController::class, 'index']);
// Route::get('/education', [EducationJurneyController::class, 'index']);
// Route::get('/experience', [ExprerienceJourneyController::class, 'index']);
// Route::get('/socialmedia', [SocialMediaController::class, 'index']);
// Route::get('/projects/{id}', [informationController::class, 'show']);
// Route::post('/projects', [informationController::class, "store"]);
Route::fallback(function () {
    return ResponseFormatter::error(NULL, " Not Valid Route");
});

Route::controller(InformationController::class)->group(function () {
    Route::get('/information', 'index');
    Route::get('/information/{id}', 'show');
    Route::post('/information', 'store');
    Route::put('/information/{id}', 'update');
    Route::delete('/information/{id}', 'destroy');
});

Route::controller(ProjectsController::class)->group(function () {
    Route::get('/projects', 'index');
    Route::get('/projects/{id}', 'show');
    Route::post('/projects', 'store');
    Route::put('/projects/{id}', 'update');
    Route::delete('/projects/{id}', 'destroy');
});

Route::controller(PostController::class)->group(function () {
    Route::get('/post', 'index');
    Route::post('/post', 'store');
    Route::put('/post/{id}', 'update');
    Route::delete('/post/{id}', 'destroy');
    Route::get('/post/{id}', 'postBasedId');
});


Route::controller(EducationController::class)->group(function () {
    Route::get('/education', 'index');
    Route::put('education/{id}', 'update');

});

Route::controller(FormController::class)->group(function () {
    Route::post('/form', 'store');
    Route::get('/form', 'index');
});

Route::controller(ExperienceController::class)->group(function () {
    Route::get('/experience', 'index');
    Route::put('/experience/{id}', 'update');
});
Route::controller(CategoryController::class)->group(function () {
    Route::get('/category', 'index');
    // Route::put('/category/{id}', 'update');
    Route::get("/category/{category}", 'categoryPost');

});
