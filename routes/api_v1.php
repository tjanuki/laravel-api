<?php

use App\Http\Controllers\Api\V1\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->apiResource('/tickets', TicketController::class);
Route::middleware('auth:sanctum')->apiResource('/users', \App\Http\Controllers\Api\V1\UsersController::class);
Route::middleware('auth:sanctum')->apiResource('/authors', \App\Http\Controllers\Api\V1\AuthorsController::class);
Route::middleware('auth:sanctum')->apiResource('/authors.tickets', \App\Http\Controllers\Api\V1\AuthorTicketsController::class);

