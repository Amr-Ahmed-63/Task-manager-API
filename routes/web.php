<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get("tasks",[TaskController::class,"index"]);
Route::get("add",[TaskController::class,"create"]);
Route::post("store",[TaskController::class,"store"]);
Route::put("edit.{id}",[TaskController::class,"edit"]);
Route::put("update.{id}",[TaskController::class,"update"]);
Route::delete("destroy.{id}",[TaskController::class,"destroy"]);
Route::get("pro",[ProfileController::class,"index"]);
Route::get("addPro",[ProfileController::class,"create"]);
Route::post("storePro",[ProfileController::class,"store"]);
Route::get("user/{id}/profile",[ProfileController::class,"show"]);
Route::get("user",[UserController::class,"index"]);
Route::get("tasks/{id}/user",[UserController::class,"show"]);
Route::post("tasks/{task_id}/category",[TaskController::class,"addCatToTask"]);
Route::get("tasks/{task_id}/category",[TaskController::class,"getCatsForTask"]);
