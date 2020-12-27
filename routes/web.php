<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;

Route::get('/todos', [TodoController::class, 'index'])->name('todo.index');

Route::get('/todos/create', [TodoController::class, 'create']);
Route::post('/todos/create', [TodoController::class, 'store']);
// Route::get('/todos/{id}/edit', [TodoController::class, 'edit']);
Route::get('/todos/{todo}/edit', [TodoController::class, 'edit']);  //route model binding
//Route::get('/todos/{todo:id}/edit', [TodoController::class, 'edit']);  //custom
Route::patch('/todos/{todo}/update', [TodoController::class, 'update'])->name('todo.update');
Route::put('/todos/{todo}/complete', [TodoController::class, 'complete'])->name('todo.complete');
Route::put('/todos/{todo}/notcomplete', [TodoController::class, 'notcomplete'])->name('todo.notcomplete');
Route::delete('/todos/{todo}/delete', [TodoController::class, 'delete'])->name('todo.delete');

Route::get('/', function () {
    return view('welcome');
});

Route::post('/upload', [UserController::class, 'uploadAvatar']);

Route::get('/home',[UserController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
