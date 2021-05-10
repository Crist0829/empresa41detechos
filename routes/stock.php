<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;

Route::get('/stock', [StockController::class, 'index'])
    ->middleware('auth')
    ->middleware('isAdmin')
    ->name('stock');

Route::get('/stock/{id}', [StockController::class, 'show'])
    ->middleware('auth')
    ->middleware('isAdmin')
    ->name('stockShow');

Route::get('/ingreso', [StockController::class, 'create'])
    ->middleware('auth')
    ->middleware('isAdmin')
    ->name('stockCreate');

Route::get('/egreso', [StockController::class, 'edit'])
    ->middleware('auth')
    ->middleware('isAdmin')
    ->name('stockEdit');