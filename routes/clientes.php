<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;


Route::get('clientes', [ClientesController::class, 'index'])
    ->middleware('auth')
    ->middleware('isAdmin')
    ->name('clientesIndex');

Route::get('clientes/show/{id}', [ClientesController::class, 'show'])
    ->middleware('auth')
    ->middleware(('isAdmin'))
    ->middleware('onlyAdmin')
    ->name('clienteShow');

Route::get('clientes/cargar', [ClientesController::class, 'create'])
    ->middleware('auth')
    ->middleware('isAdmin')
    ->middleware('onlyAdmin')
    ->name('clientesCreate');

Route::get('clientes/trabajos/{id}', [ClientesController::class, 'trabajoShow'])
    ->middleware('auth')
    ->middleware('isAdmin')
    ->middleware('onlyAdmin')
    ->name('trabaShow');