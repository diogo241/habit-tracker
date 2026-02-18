<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index']);

// LOGIN
Route::get('/login', action: [LoginController::class, 'index']);
Route::post('/login', action: [LoginController::class, 'authenticate']);
