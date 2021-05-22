<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedoresController;
use App\Models\Proveedor;

Route::get('/proveedores', [ProveedoresController::class, 'index'])
    ->middleware('auth')
    ->middleware('isAdmin')
    ->name('proveedoresIndex');

Route::get('/proveedores/cargar', [ProveedoresController::class, 'create'])
    ->middleware('auth')
    ->middleware('isAdmin')
    ->name('proveedoresCreate');


Route::get('/proveedores/show/{id}', [ProveedoresController::class, 'show'])
    ->middleware('auth')
    ->middleware('isAdmin')
    ->name('proveedoresShow');

