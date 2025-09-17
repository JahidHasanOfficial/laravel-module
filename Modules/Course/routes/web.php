<?php

use Illuminate\Support\Facades\Route;
use Modules\Course\Http\Controllers\CourseController;
use Modules\Course\Http\Controllers\TrainerController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('courses', CourseController::class)->names('course');
});


// Trainer
Route::resource('trainers', TrainerController::class)->names('trainer');