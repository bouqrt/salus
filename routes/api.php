<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SymptomsController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Api\HealthAdviceController;


Route::get('/user', function (Request $request) {

    return $request->user();
})->middleware('auth:sanctum');
Route::post(
    "logout",
    [AuthController::class, "logout"]
)->middleware('auth:sanctum');

Route::post('register', [AuthController::class, "create"]);
Route::post('login', [AuthController::class, "login"]);


Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('symptoms', SymptomsController::class);
    Route::apiResource('appointments', AppointmentController::class)->except(['update']);
    Route::get('/doctors', [DoctorController::class, 'index']);
    Route::get('/doctors/search', [DoctorController::class, 'search']);
    Route::get('/doctors/{id}', [DoctorController::class, 'show']);
    Route::post('/ai/health-advice', [HealthAdviceController::class, 'generate']);
    Route::get('/ai/history', [HealthAdviceController::class, 'index']);



    Route::get('/me', function (Request $request) {
        return response()->json([
            'success' => true,
            'data' => $request->user()
        ]);
    });
});
