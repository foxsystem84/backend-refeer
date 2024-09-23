<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PtiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post('/login',[AuthController::class, "login"]);
Route::post('/register', [AuthController::class, "register"]);


Route::get('/pti/{userId}', [PtiController::class, "getPtisbyUser"]);
Route::delete('/pti/{userId}', [PtiController::class, "destroy"]);
Route::get('/pti', [PtiController::class, "index"]);
Route::post('/pti', [PtiController::class, "store"]);
