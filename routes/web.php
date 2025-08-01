<?php

use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/json', function () {
    return ["id" => 22, "age" => 45];
});

Route::post("/todos", [TodosController::class, "store"])->name("todos");
Route::get("/todos", [TodosController::class, "index"])->name("todos");
Route::delete('/todos/{id}', [TodosController::class, 'destroy'])->name('todos-destroy');
Route::get('/todos/{id}', [TodosController::class, 'show'])->name('todos-edit');
Route::patch('/todos/{id}', [TodosController::class, 'update'])->name('todos-update');
