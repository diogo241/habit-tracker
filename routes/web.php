<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HabitController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('site.index');
// LOGIN
Route::get('/login', action: [LoginController::class, 'index'])->name('site.login');
Route::post('/login', action: [LoginController::class, 'authenticate'])->name('auth.login');
Route::get('/register', action: [RegisterController::class, 'index'])->name('site.register');
Route::post('/register', action: [RegisterController::class, 'store'])->name('auth.register');


// ROUTES FOR AUTHENTICATED USERS
Route::middleware('auth')->group(function () {
  Route::post('/logout', action: [LoginController::class, 'logout'])->name('auth.logout');

  // HABITS
  Route::resource('/dashboard/habits', HabitController::class)->except('show');
  Route::get('/dashboard/habits/config', [HabitController::class, 'settings'])->name('habits.settings');
  Route::post('/dashboard/{habit}/toggle', [HabitController::class, 'toggle'])->name('habits.toggle');
  Route::get('/dashboard/habits/history/{year?}', [HabitController::class, 'history'])->name('habits.history');
});
