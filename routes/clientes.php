<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;


Route::get('clientes', [ClientesController::class, 'index'])
    ->middleware('auth')
    ->middleware('isAdmin')
    ->name('clientesIndex');