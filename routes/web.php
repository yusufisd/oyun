<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionsController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/transactions', [TransactionsController::class, 'index'])->name('transactions.index');