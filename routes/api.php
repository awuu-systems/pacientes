<?php

use App\Http\Controllers\Api\MntSignoVitalRegistradoController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::middleware('auth::sanctum')->group(function(){
    Route::get('/user', [UserController::class, 'getUser']);
    Route::prefix('paciente')->group(function(){
    Route::get('/signo-vital',[MntSignoVitalRegistradoController::class,'index']);
    });
});
Route::prefix('auth')->group(function(){
    Route::post('/iniciar-sesion',[UserController::class,  'login']);
    Route::post('/registro',[UserController::class, 'registro']);
});