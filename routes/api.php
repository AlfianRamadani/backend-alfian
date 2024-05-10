<?php

use App\Http\Controllers\EducationJurneyController;
use App\Http\Controllers\ExprerienceJourneyController;
use App\Http\Controllers\informationController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\SocialMediaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/information', [informationController::class, 'index']);
Route::get('/education', [EducationJurneyController::class, 'index']);
Route::get('/experience', [ExprerienceJourneyController::class, 'index']);
Route::get('/socialmedia', [SocialMediaController::class, 'index']);
Route::get('/projects/{id}', [informationController::class, 'show']);