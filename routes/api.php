<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\PacientesController;

Route::get('/pacientes', [PacientesController::class, 'listaPacientes']);

Route::get('/usuarios', [UsersController::class, 'listUser']);
Route::get('/usuarios/{id}', [UsersController::class, 'showUser']);
Route::delete('/usuarios/{id}', [UsersController::class, 'deleteUser']);
Route::post('/newuser', [UsersController::class, 'add']);
Route::put('/updateuser/{id}', [UsersController::class, 'updateUser']);