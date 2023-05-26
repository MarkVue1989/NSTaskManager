<?php

use App\Http\Controllers\CreateTaskController;
use App\Http\Controllers\GetTasksController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/task",[GetTasksController::class,'__invoke']);
Route::post("/task",[CreateTaskController::class,'__invoke']);
