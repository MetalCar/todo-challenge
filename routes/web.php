<?php

use App\Http\Controllers\ToDoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ToDoController::class, 'index'])->name('todo.index');
Route::get('/load-list', [ToDoController::class, 'getToDos'])->name('todo.load-list');
Route::post('/add', [ToDoController::class, 'store'])->name('todo.store');
Route::put('/{toDo}', [ToDoController::class, 'update'])->name('todo.update');
Route::post('/{toDo}/complete', [ToDoController::class, 'toggleDone'])->name('todo.toggleDone');
