<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/tickets', [\App\Http\Controllers\Api\V1\TicketController::class, 'index']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
