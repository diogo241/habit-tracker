<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('site.index');

// LOGIN
Route::get('/login', action: [LoginController::class, 'index'])->name('site.login');
Route::post('/login', action: [LoginController::class, 'authenticate'])->name('auth.login');

// ROUTES FOR AUTHENTICATED USERS
Route::middleware('auth')->group(function () {
  Route::get('/dashboard', [SiteController::class, 'dashboard'])->name('site.dashboard');
  Route::post('/logout', action: [LoginController::class, 'logout'])->name('auth.logout');
});
