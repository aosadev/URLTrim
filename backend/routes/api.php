<?php

use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/shorten', [UrlController::class, 'shorten']);
    Route::get('/my-urls', [UrlController::class, 'myUrls']);
});

Route::get('/{code}', [UrlController::class, 'redirect']);

Route::post('/register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'store']);
Route::post('/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy']);

