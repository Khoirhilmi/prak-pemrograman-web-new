<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanController;

Route::get('/borrow/{id}', [LoanController::class, 'borrow']);
Route::get('/return/{id}', [LoanController::class, 'return']);
Route::get('/', function () {
    return view('welcome');
});
