<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified', 'role'])->group(function () {
    Route::view('dashboard', 'admin.dashboard')->name('dashboard');
    Route::view('tasks', 'admin.tasks')->name('admin.task');
});

Route::prefix('/team')->group(function () {
    Route::view('dashboard', 'team.dashboard')->name('dashboard.user');
});

require __DIR__.'/settings.php';
