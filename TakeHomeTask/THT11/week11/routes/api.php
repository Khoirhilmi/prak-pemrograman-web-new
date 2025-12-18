<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RestoranController;


Route::get('/menus', [MenuController::class, 'index']);
Route::get('/menus/{id}', [MenuController::class, 'show']);
Route::post('/menus', [MenuController::class, 'store']);
Route::put('/menus/{id}', [MenuController::class, 'update']);
Route::delete('/menus/{id}', [MenuController::class, 'destroy']);

Route::get('/restorans', [RestoranController::class, 'index']);
Route::get('/restorans/{id}', [RestoranController::class, 'show']);
Route::post('/restorans', [RestoranController::class, 'store']);
Route::put('/restorans/{id}', [RestoranController::class, 'update']);
Route::delete('/restorans/{id}', [RestoranController::class, 'destroy']);

// ATAU

// Cara 2: Resource Route (Uncomment baris di bawah dan comment baris di atas)
// Route::apiResource('menus', MenuController::class);
