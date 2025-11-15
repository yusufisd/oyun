<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InFlowController;
use App\Http\Controllers\OutFlowController;

Route::middleware('token.control')->group(function () {
    Route::post('/transactions/inflow', [InFlowController::class, 'store'])->name('transactions.inflow.store');
    Route::post('/transactions/outflow', [OutFlowController::class, 'store'])->name('transactions.outflow.store');
});

