<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PacienteController;
use App\Http\Controllers\Api\OdontologoController;
use App\Http\Controllers\Api\CitaController;

// Pacientes
Route::get('/pacientes', [PacienteController::class, 'index']);     
Route::post('/pacientes', [PacienteController::class, 'store']);     
Route::get('/pacientes/{id}', [PacienteController::class, 'show']);  
Route::put('/pacientes/{id}', [PacienteController::class, 'update']); 
Route::delete('/pacientes/{id}', [PacienteController::class, 'destroy']);

// Odontologos
Route::get('/odontologos', [OdontologoController::class, 'index']);
Route::post('/odontologos', [OdontologoController::class, 'store']);
Route::get('/odontologos/{id}', [OdontologoController::class, 'show']);
Route::put('/odontologos/{id}', [OdontologoController::class, 'update']);
Route::delete('/odontologos/{id}', [OdontologoController::class, 'destroy']);

// Citas
Route::get('/citas', [CitaController::class, 'index']);
Route::post('/citas', [CitaController::class, 'store']);
Route::get('/citas/{id}', [CitaController::class, 'show']);
Route::put('/citas/{id}', [CitaController::class, 'update']);
Route::delete('/citas/{id}', [CitaController::class, 'destroy']);