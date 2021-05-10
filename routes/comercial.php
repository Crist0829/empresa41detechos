<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComercioController;

Route::get('/comercial', [ComercioController::class, 'index'])
    ->middleware('auth')
    ->middleware('isAdmin')
    ->name('comercioIndex');


route::get('/facturacion', [ComercioController::class, 'facturacion'])
    ->middleware('auth')
    ->middleware('isAdmin')
    ->name('comercioFacturacion');

route::get('/remitos', [ComercioController::class, 'remitos'])
    ->middleware('auth')
    ->middleware('isAdmin')
    ->name('comercioRemitos');

