<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RuanganController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\KategoriController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('ruangan', RuanganController::class);
Route::delete('/ruangan/{id}', [RuanganController::class, 'destroy']);
Route::post('login', [AuthController::class, 'login']);
Route::get('kategori', [KategoriController::class, 'index']);

