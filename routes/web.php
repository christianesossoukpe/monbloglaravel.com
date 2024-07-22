<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [PagesController::class, 'index']);
// Route::get('/contact-us', [PagesController::class, 'contact']);

// Route::get('/contact-us', function() {
//     return view('layouts.contact');
// });
Route::controller(PagesController::class)
    ->group(function() {
        Route::get('/', 'index');
        Route::get('/contact-us', 'contact');
        Route::get('/about', 'about');
});

Route::controller(ArticleController::class)->group(function() {
    Route::get('/articles', 'index');
});