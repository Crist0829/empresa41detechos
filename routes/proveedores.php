<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedoresController;

Route::get('/proveedores', [ProveedoresController::class, 'index'])
    ->middleware('auth')
    ->middleware('isAdmin')
    ->name('proveedoresIndex');