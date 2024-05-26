<?php

use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return "hello";
    });

    require __DIR__.'/auth.php';
// Route::fallback(function () {
//     return ResponseFormatter::error(NULL, " Not Valid Route", 422);
// });