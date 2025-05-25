<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackExerciseController;

Route::post('/add_back_exercise', [BackExerciseController::class, 'add_back_exercise']);

Route::post('/update_exercise', [BackExerciseController::class, 'update_exercise']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get_back_exercises', [BackExerciseController::class, 'index']);

Route::delete('/delete_exercise/{id}', [BackExerciseController::class, 'delete']);