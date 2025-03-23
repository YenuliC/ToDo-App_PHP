<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Show all tasks
Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

// Store a new task
Route::post('/', [TaskController::class, 'store'])->name('tasks.store');

// Mark a task as completed (use PATCH for updates)
Route::patch('/{id}/complete', [TaskController::class, 'complete'])->name('tasks.complete');

// Delete a task
Route::delete('/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
