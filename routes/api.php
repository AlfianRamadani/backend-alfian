<?php

use App\Http\Controllers\AccountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('account',[AccountController::class,'index']); 
Route::get('account/{id}',[AccountController::class,'show']); 
Route::post('account',[AccountController::class,'store']); 
Route::put('account/{id}',[AccountController::class,'update']); 
Route::delete('account/{id}',[AccountController::class,'destroy']); 

