<?php

use App\Http\Controllers\Api\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;



Route::prefix('auth')->group(function(){
    Route::post('/iniciar-sesion',[UserController::class,  'login']);
});