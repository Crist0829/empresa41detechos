<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropietarioUsuariosController;

Route::get('/usuarios', [PropietarioUsuariosController::class, 'index'])
    ->middleware('auth')
    ->middleware('isAdmin')
    ->middleware('onlyAdmin')
    ->name('adminusuarios');

Route::get('/usuario/{id}', [PropietarioUsuariosController::class, 'show'])
    ->middleware('auth')
    ->middleware('isAdmin')
    ->middleware('onlyAdmin')
    ->name('showusuario');