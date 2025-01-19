<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource("tasks",TaskController::class);
// Route::apiResource("profiles",ProfileController::class);

// Route::get("tasks",[TaskController::class,"index"]);
// Route::get("add",[TaskController::class,"create"]);
// Route::post("store",[TaskController::class,"store"]);
// Route::put("edit.{id}",[TaskController::class,"edit"]);
// Route::put("update.{id}",[TaskController::class,"update"]);
// Route::put("show.{id}",[TaskController::class,"show"]);
// Route::delete("destroy.{id}",[TaskController::class,"destroy"]);
Route::get("profile",[ProfileController::class,"index"]);
Route::post("tasks/{task_id}/category",[TaskController::class,"addCatToTask"]);
Route::get("tasks/{task_id}/category",[TaskController::class,"getCatsForTask"]);
Route::get("cat/{category_id}/tasks",[TaskController::class,"getTasksForCat"]);
Route::post("usee",[UserController::class,"store"]);
Route::post("login",[UserController::class,"login"]);
Route::post("logout",[UserController::class,"logout"])->middleware('auth:sanctum');
