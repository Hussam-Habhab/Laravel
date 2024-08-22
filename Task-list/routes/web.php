<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('auth.create');
});

// Route::resource('/',TaskController::class);
// Route::get('home',[TaskController::class,'index'])->name('home');

// Route::post('home',[TaskController::class ,'store'])->name('hello');
Route::resource('tasks', TaskController::class);
Route::resource('auth', AuthController::class);

// Route::post('home',[TaskController::class ,'store']);

// Route::delete();