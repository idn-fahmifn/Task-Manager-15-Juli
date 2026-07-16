<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Admin\Taskmanager;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::view('dashboard', 'admin.dashboard')->name('dashboard');
    Route::get('tasks', Taskmanager::class)->name('admin.task');
    Route::view('boards', 'admin.board')->name('admin.board');
});

Route::prefix('/team')->group(function () {
    Route::view('dashboard', 'team.dashboard')->name('dashboard.user');
});

require __DIR__.'/settings.php';
