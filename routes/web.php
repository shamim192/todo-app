<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::put('/tasks/toggle-status', [TaskController::class, 'toggleStatus'])->name('tasks.toggleStatus');
Route::resource('tasks', TaskController::class);
