<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PartController;

// Головна сторінка
Route::get('/', [MainController::class, 'index'])->name('home');

// Сторінка "Про проєкт"
Route::get('/about', [MainController::class, 'about'])->name('about');

// Каталог запчастин (список)
Route::get('/parts', [PartController::class, 'index'])->name('parts.index');

// Сторінка конкретної запчастини (по ID)
Route::get('/parts/{id}', [PartController::class, 'show'])->name('parts.show');