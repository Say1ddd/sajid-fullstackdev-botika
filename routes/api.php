<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DivisiController;
use App\Http\Controllers\Api\KaryawanController;
use App\Http\Controllers\Api\PekerjaanController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::apiResource('karyawan', KaryawanController::class);
    Route::apiResource('divisi', DivisiController::class);
    Route::apiResource('pekerjaan', PekerjaanController::class);
});