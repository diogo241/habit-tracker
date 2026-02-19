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
  Route::get('/dashboard', [SiteController::class, 'dashboard'])->name('site.dashboard');
  Route::post('/logout', action: [LoginController::class, 'logout'])->name('auth.logout');

  // HABITS
  Route::get('/dashboard/habits/create', action: [HabitController::class, 'create'])->name('habit.create');
  Route::post('/dashboard/habits', action: [HabitController::class, 'store'])->name('habit.store');
  Route::delete('/dashboard/habits/{habit}', action: [HabitController::class, 'destroy'])->name('habit.destroy');
});
