<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('home');
});

// A mano ruta por ruta
//Route::get('/task/create', [TaskController::class, 'create'])->name('task.create');

// Importa todos los estandar creados por artisan
Route::resource('task', TaskController::class);
