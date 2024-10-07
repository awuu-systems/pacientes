<?php

use App\Http\Controllers\Api\CtlSignoVitalController;
use App\Http\Controllers\Api\CtlSintomaController;
use App\Http\Controllers\Api\MntAlarmaController;
use App\Http\Controllers\Api\MntCitaMedicaAsignadaController;
use App\Http\Controllers\Api\MntEnfermedadRegistradaController;
use App\Http\Controllers\Api\MntPacienteController;
use App\Http\Controllers\Api\MntRegistroSintomaController;
use App\Http\Controllers\Api\MntSignoVitalRegistradoController;
use App\Http\Controllers\Api\UserController;
use App\Models\CtlSignoVital;
use App\Models\MntAlarma;
use App\Models\MntCitaMedicaAsignada;
use App\Models\MntEnfermedadRegistrada;
use App\Models\MntRegistroSintoma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::middleware('auth::sanctum')->get('/user', function(Request $request){
    return $request->user();
});
Route::get('/user', [UserController::class, 'getUser']);

Route::prefix('auth')->group(function(){
    Route::post('/iniciar-sesion',[UserController::class,  'login']);
    Route::post('/registro',[UserController::class, 'registro']);
});

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/cerrar-sesion',[UserController::class,  'logout']);
    Route::prefix('paciente')->group(function(){
        Route::get('/signo-vital',[MntSignoVitalRegistradoController::class,'index']);
        Route::post('/signo-vital',[MntSignoVitalRegistradoController::class, 'store']);
        Route::get('/signos-vitales',[CtlSignoVitalController::class, 'index']);
        Route::post('/enfermedad', [MntEnfermedadRegistradaController::class, 'store']);
        Route::get('/enfermedad', [MntEnfermedadRegistradaController::class, 'index']);
        Route::get('/sintomas',[CtlSintomaController::class, 'index']);
        Route::get('/sintoma',[MntRegistroSintomaController::class, 'index']);
        Route::post('/sintoma', [MntRegistroSintomaController::class, 'store']);
        Route::post('/alarma',[MntAlarmaController::class,'store']);
        Route::get('/alarma',[MntAlarmaController::class,'index']);
        Route::put('/estado-alarma',[MntAlarmaController::class, 'cambiarEstado']);
    });

    Route::prefix('doctor')->group(function(){
        Route::get('/pacientes',[MntPacienteController::class,'index']);
        Route::post('/cita-medica',[MntCitaMedicaAsignadaController::class,'store']);
        Route::get('/cita-medica',[MntCitaMedicaAsignadaController::class, 'index']);

    });

});
