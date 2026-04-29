<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\User\HomeController;

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.home')->middleware('auth');
// Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard')->middleware('auth');
// Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users')->middleware('auth');

Route::middleware(['auth', 'status', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{id}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{id}/update', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::put('/users/{id}/status', [AdminUserController::class, 'changeStatus'])->name('admin.users.status');
    Route::delete('/users/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.delete');
});

Route::middleware(['auth', 'status', 'user'])->prefix('user')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('user.home');
});