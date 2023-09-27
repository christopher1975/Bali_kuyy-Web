<?php

use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\WisataController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\FeedbackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login-user', [UserController::class, 'login']);
Route::post('register-user', [UserController::class, 'register']);
Route::middleware('auth:sanctum')->post('logout-user', [UserController::class, 'logout']);

Route::get('daftar-wisata', [WisataController::class, 'getAllWisata']);
Route::get('daftar-event', [EventController::class, 'getAllEvent']);

Route::post('add-feedback', [FeedbackController::class, 'addFeedback']);


Route::get('dashboard', [DashboardController::class, 'getData']);
Route::get('/feedback-wisata', [FeedbackController::class, 'getWisataFeedback']);
Route::get('/feedback-user', [FeedbackController::class, 'getUserFeedback']);