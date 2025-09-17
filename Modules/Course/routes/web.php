<?php

use Illuminate\Support\Facades\Route;
use Modules\Course\Http\Controllers\CourseController;
use Modules\Course\Http\Controllers\TrainerController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('courses', CourseController::class)->names('course');
});


// Trainer
Route::prefix('course')->group(function () {
    Route::get('trainers', [TrainerController::class, 'index'])->name('trainers.index');
    Route::get('trainers/create', [TrainerController::class, 'create'])->name('trainers.create');
    Route::post('trainers', [TrainerController::class, 'store'])->name('trainers.store');
    Route::get('trainers/{id}/edit', [TrainerController::class, 'edit'])->name('trainers.edit');
    Route::put('trainers/{id}', [TrainerController::class, 'update'])->name('trainers.update');
    Route::delete('trainers/{id}', [TrainerController::class, 'destroy'])->name('trainers.destroy');
});