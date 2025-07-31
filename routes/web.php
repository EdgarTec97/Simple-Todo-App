<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todos', function () {
    return view('todos.index');
});

Route::get('/json', function () {
    return ["id" => 22, "age" => 45];
});
