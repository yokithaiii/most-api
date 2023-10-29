<?php

use App\Http\Controllers\Api\ParticipantCreateController;
use App\Http\Controllers\Api\ParticipantsController;
use App\Http\Controllers\Api\UserLoginController;
use App\Http\Controllers\Api\UserCreateController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\VoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/user-create', UserCreateController::class);
Route::post('/user-login', UserLoginController::class);
Route::get('/get-clients', UsersController::class);

Route::post('/create-participant', ParticipantCreateController::class);
Route::get('/get-participant', ParticipantsController::class);

Route::middleware('auth:sanctum')->post('/vote', VoteController::class);
